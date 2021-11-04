<?php

namespace App\Http\Controllers\User;

use App\Events\ResetPasswordConfirmed;
use App\Http\Controllers\Controller;
use App\Http\Requests\ChangePasswordRequest;
use App\Http\Requests\ResetPasswordRequest;
use App\Mail\ResetPasswordMail;
use App\Models\Category;
use App\Models\Comment;
use App\Models\Post;
use App\Models\User;
use App\Rules\RequiresAtLeast8CharactersAndContainAtLeast1LetterAnd1Number;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;

class UserController extends Controller
{
    /**
     * Change password form
     *
     * @return view
     */
    public function changePasswordForm()
    {
        return view('web.main.change-password', [
            'categories' => Category::all(),
            'site' => 'changePassword'
        ]);
    }

    /**
     * Change password handle
     *
     * @param ChangePasswordRequest $request
     *
     * @return void
     */
    public function changePassword(ChangePasswordRequest $request)
    {
        $user = User::find(Auth::user()->id);
        if (!Hash::check($request->input('old_password'), $user->password)) {
            return redirect(route('user.changePasswordForm'))->with('incorrect_password', 'Sai mật khẩu');
        }
        $user->password = trim($request->input('confirm_password'));
        $user->save();
        return redirect('/')->with('success', 'Thay đổi mật khẩu thành công');
    }

    /**
     * Get email form fo reset password
     *
     * @return view
     */
    public function getEmailForm()
    {
        return view('web.main.get-email-for-reset-password', [
            'categories' => Category::all(),
            'site' => 'resetPassword'
        ]);
    }

    /**
     * Send email to confirm reset password
     *
     * @param Request $request
     *
     * @return void
     */
    public function sendEmail(Request $request)
    {
        $request->validate([
            'email' => 'required|email'
        ]);
        $request->flash();
        $user = User::where('email', 'like', '%' . trim($request->input('email')) . '%')->first();
        if ($user) {
            // Phát sự kiện ngườI dùng confirm email
            event(new ResetPasswordConfirmed($user));
            return redirect(route('user.getEmail'))->with('error', 'Chúng tôi đã gửi thư vào email của bạn, vui lòng kiểm tra email và xác thực');
        }
        return redirect(route('user.getEmail'))->with('invalid_email', 'Không tồn tại email');
    }

    /**
     * Show reset password form
     *
     * @param User $user
     *
     * @return view
     */
    public function resetPasswordForm(User $user)
    {
        return view('web.main.reset-password', [
            'categories' => Category::all(),
            'site' => 'resetPassword',
            'user' => $user->token
        ]);
    }

    /**
     * Reset password handle
     *
     * @param User $user
     * @param ResetPasswordRequest $request
     *
     * @return void
     */
    public function resetPassword(User $user, ResetPasswordRequest $request)
    {
        $passwordReset = DB::table('password_resets')->updateOrInsert(
            [
                'email' => $user->email
            ],
            [
                'token' => $user->token,
                'created_at' => Carbon::now()
            ]
        );
        $user->password = trim($request->input('confirm_password'));
        $user->token = md5($user->first_name . $user->last_name . $user->email . date('Y-m-d H:i:s'));
        $user->save();
        Auth::logout();
        return redirect(route('login.show'))->with('success', 'Đặt lại mật khẩu thành công, vui lòng đăng nhập lại bằng mật khẩu mới');
    }

    /**
     * Add comment
     *
     * @param Request $request
     * @param Post $post
     * @param mixed $total
     *
     * @return view
     */
    public function addComment(Request $request, Post $post, $total)
    {
        $comment = Comment::create([
            'user_id' => Auth::user()->id,
            'post_id' => $post->id,
            'content' => $request->content
        ]);

        $total = $total < 6 ? 6 : $total;

        $comments = Comment::getComments($post, $total);
        return view('web.parts.comment._new-comment', compact('comments'));
    }

    /**
     * Show next comments
     *
     * @param Post $post
     * @param mixed $total
     *
     * @return view
     */
    public function showNextComments(Post $post, $total)
    {
        $comments = Comment::getNextComments($post, $total);
        return view('web.parts.comment._new-comment', compact('comments'));
    }

    /**
     * Edit comment
     *
     * @param Request $request
     * @param Comment $comment
     *
     * @return view
     */
    public function editComment(Request $request, Comment $comment)
    {
        $comment->content = $request->content;
        $comment->save();
        return view('web.parts.comment._editted-comment', compact('comment'));
    }

    /**
     * Delete comment
     *
     * @param Comment $comment
     *
     * @return bool
     */
    public function deleteComment(Comment $comment)
    {
        return $comment->delete();
    }
}
