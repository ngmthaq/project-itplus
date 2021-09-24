@if (count($users) > 0)
    @foreach ($users as $user)
        <tr>
            <th scope="row" style="width: 100px;">U{{ $user->id }}</th>
            <td>{{ $user->first_name }} {{ $user->last_name }}</td>
            <td style="width: 200px;">{{ date('d/m/Y', strtotime($user->userInformation->dob)) }}</td>
            <td style="width: 200px;">
                @php
                    echo $user->userInformation->is_male == 1 ? 'Nam' : 'Nữ';
                @endphp
            </td>
            @if ($user->role_id == 1)
                <td style="width: 200px;">
                    <a href="{{ route('admin.showUser', ['user' => $user->id]) }}" class="btn btn-sm btn-primary">
                        <i class="fas fa-eye"></i>
                    </a>
                    <a href="javascript:void(0)" class="btn btn-sm btn-warning" data-id="{{ $user->id }}"
                        onclick="grandMod(this)">
                        <i class="fas fa-arrow-down"></i>
                    </a>
                </td>
            @endif
            @if ($user->role_id == 2)
                <td style="width: 200px;">
                    <a href="{{ route('admin.showUser', ['user' => $user->id]) }}" class="btn btn-sm btn-primary">
                        <i class="fas fa-eye"></i>
                    </a>
                    <a href="javascript:void(0)" class="btn btn-sm btn-success" data-id="{{ $user->id }}"
                        onclick="grandMod(this)">
                        <i class="fas fa-arrow-up"></i>
                    </a>
                    <a href="javascript:void(0)" class="btn btn-sm btn-danger" data-id="{{ $user->id }}"
                        onclick="deleteUser(this)">
                        <i class="far fa-trash-alt"></i>
                    </a>
                </td>
            @endif
            @if ($user->role_id == 3)
                <td style="width: 200px;">
                    <a href="{{ route('admin.showUser', ['user' => $user->id]) }}" class="btn btn-sm btn-primary">
                        <i class="fas fa-eye"></i>
                    </a>
                    <a href="javascript:void(0)" class="btn btn-sm btn-success" data-id="{{ $user->id }}"
                        onclick="grandAdmin(this)">
                        <i class="fas fa-arrow-up"></i>
                    </a>
                    <a href="javascript:void(0)" class="btn btn-sm btn-warning" data-id="{{ $user->id }}"
                        onclick="grandReader(this)">
                        <i class="fas fa-arrow-down"></i>
                    </a>
                </td>
            @endif
        </tr>
    @endforeach
@else
    <tr>
        <td colspan="5">Không có người dùng</td>
    </tr>
@endif
