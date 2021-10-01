@extends('layouts.dashboard')

@section('title')
    Quản lý người dùng | The Vietnam Newspaper | Trang thông tin - tin tức
@endsection

@push('css')

@endpush

@section('content')
    <section class="dashboard-content">
        <div class="dashboard-container">
            <div class="row">
                <div class="col-12">
                    <ul class="breadcrum vi my-3">
                        <li><a href="{{ route('admin.dashboard') }}">Dashboard</a></li>
                        <li><i class="fas fa-angle-right"></i></li>
                        <li>Quản lý người dùng</li>
                    </ul>
                </div>
            </div>
            <div class="row mb-3">
                <div class="col-12">
                    <div class="padding-12">
                        <h5>Lưu ý</h5>
                        <ul>
                            <li>Không thể xoá thông tin của quản trị viên</li>
                            <li>Phải phân quyền quản trị viên xuống người dùng mới có thể xoá</li>
                            <li>Không tự tiện xoá người dùng</li>
                            <li>Không tự tiện phân quyền người dùng lên làm quản trị viên</li>
                        </ul>
                    </div>
                </div>
            </div>
            <div class="row mb-3">
                <div class="col-12">
                    <form class="padding-12">
                        <label for="user-search-input">
                            <h5>Tìm kiếm người dùng:</h5>
                        </label>
                        <input type="text" id="user-search-input" class="form-control"
                            placeholder="Nhập thông tin cần tìm kiếm ...">
                    </form>
                </div>
            </div>
            <div class="row mb-3">
                <div class="col-12">
                    <div class="padding-12">
                        <h5>Quản trị viên</h5>
                        <table class="table">
                            <thead class="thead-light">
                                <tr>
                                    <th scope="col">ID</th>
                                    <th scope="col">Họ tên</th>
                                    <th scope="col">Ngày sinh</th>
                                    <th scope="col">Giới tính</th>
                                    <th></th>
                                </tr>
                            </thead>
                            <tbody id="admin-table">
                                @if (count($admins) > 0)
                                    @foreach ($admins as $admin)
                                        <tr class="user-row">
                                            <th scope="row" style="width: 100px;">U{{ $admin->id }}</th>
                                            <td>{{ $admin->first_name }} {{ $admin->last_name }}</td>
                                            <td style="width: 200px;">
                                                {{ date('d/m/Y', strtotime($admin->userInformation->dob)) }}</td>
                                            <td style="width: 200px;">
                                                @php
                                                    echo $admin->userInformation->is_male == 1 ? 'Nam' : 'Nữ';
                                                @endphp
                                            </td>
                                            <td style="width: 200px;">
                                                <a href="{{ route('admin.showUser', ['user' => $admin->id]) }}"
                                                    class="btn btn-sm btn-primary" title="Xem thông tin">
                                                    <i class="fas fa-eye"></i>
                                                </a>
                                                <a href="javascript:void(0)" class="btn btn-sm btn-warning"
                                                    data-id="{{ $admin->id }}" onclick="grandMod(this)" title="Phân quyền là người quản lý">
                                                    <i class="fas fa-arrow-down"></i>
                                                </a>
                                            </td>
                                        </tr>
                                    @endforeach
                                @else
                                    <tr>
                                        <td colspan="5">Không có người dùng</td>
                                    </tr>
                                @endif
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
            <div class="row mb-3">
                <div class="col-12">
                    <div class="padding-12">
                        <h5>Nhân viên quản lý</h5>
                        <table class="table">
                            <thead class="thead-light">
                                <tr>
                                    <th scope="col">ID</th>
                                    <th scope="col">Họ tên</th>
                                    <th scope="col">Ngày sinh</th>
                                    <th scope="col">Giới tính</th>
                                    <th></th>
                                </tr>
                            </thead>
                            <tbody id="mod-table">
                                @if (count($mods) > 0)
                                    @foreach ($mods as $mod)
                                        <tr class="user-row">
                                            <th scope="row" style="width: 100px;">U{{ $mod->id }}</th>
                                            <td>{{ $mod->first_name }} {{ $mod->last_name }}</td>
                                            <td style="width: 200px;">
                                                {{ date('d/m/Y', strtotime($mod->userInformation->dob)) }}</td>
                                            <td style="width: 200px;">
                                                @php
                                                    echo $mod->userInformation->is_male == 1 ? 'Nam' : 'Nữ';
                                                @endphp
                                            </td>
                                            <td style="width: 200px;">
                                                <a href="{{ route('admin.showUser', ['user' => $mod->id]) }}"
                                                    class="btn btn-sm btn-primary" title="Xem thông tin">
                                                    <i class="fas fa-eye"></i>
                                                </a>
                                                <a href="javascript:void(0)" class="btn btn-sm btn-success"
                                                    data-id="{{ $mod->id }}" onclick="grandAdmin(this)" title="Phân quyền là quản trị viên">
                                                    <i class="fas fa-arrow-up"></i>
                                                </a>
                                                <a href="javascript:void(0)" class="btn btn-sm btn-warning"
                                                    data-id="{{ $mod->id }}" onclick="grandReader(this)" title="Phân quyền là người dùng">
                                                    <i class="fas fa-arrow-down"></i>
                                                </a>
                                            </td>
                                        </tr>
                                    @endforeach
                                @else
                                    <tr>
                                        <td colspan="5">Không có người dùng</td>
                                    </tr>
                                @endif
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
            <div class="row mb-3">
                <div class="col-12">
                    <div class="padding-12">
                        <div class="label-container">
                            <h5>Người dùng</h5>
                            <div class="form-check">
                                <input type="checkbox" id="hideDeletedUser" class="form-check-input" value="hidden">
                                <label for="hideDeletedUser" class="form-check-label" style="user-select: none;">
                                    Ẩn người dùng đã xoá
                                </label>
                            </div>
                        </div>
                        <table class="table">
                            <thead class="thead-light">
                                <tr>
                                    <th scope="col">ID</th>
                                    <th scope="col">Họ tên</th>
                                    <th scope="col">Ngày sinh</th>
                                    <th scope="col">Giới tính</th>
                                    <th></th>
                                </tr>
                            </thead>
                            <tbody id="reader-table">
                                @if (count($readers) > 0)
                                    @foreach ($readers as $reader)
                                        <tr class="user-row @php echo ($reader->deleted_at) ? 'hidden' : 'visible'  @endphp">
                                            <th scope="row" style="width: 100px;">U{{ $reader->id }}</th>
                                            <td>{{ $reader->first_name }} {{ $reader->last_name }}</td>
                                            <td style="width: 200px;">
                                                {{ date('d/m/Y', strtotime($reader->userInformation->dob)) }}</td>
                                            <td style="width: 200px;">
                                                @php
                                                    echo $reader->userInformation->is_male == 1 ? 'Nam' : 'Nữ';
                                                @endphp
                                            </td>
                                            @if ($reader->deleted_at)
                                                <td>
                                                    <a href="javascript:void(0)" class="btn btn-sm btn-secondary disabled">
                                                        Đã xoá
                                                    </a>
                                                </td>
                                            @else
                                                <td style="width: 200px;">
                                                    <a href="{{ route('admin.showUser', ['user' => $reader->id]) }}"
                                                        class="btn btn-sm btn-primary" title="Xem thông tin">
                                                        <i class="fas fa-eye"></i>
                                                    </a>
                                                    <a href="javascript:void(0)" class="btn btn-sm btn-success"
                                                        data-id="{{ $reader->id }}" onclick="grandMod(this)" title="Phân quyền là người quản lý">
                                                        <i class="fas fa-arrow-up"></i>
                                                    </a>
                                                    <a href="javascript:void(0)" class="btn btn-sm btn-danger"
                                                        data-id="{{ $reader->id }}" onclick="deleteUser(this)" title="Xoá người dùng">
                                                        <i class="far fa-trash-alt"></i>
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
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection

@push('js')
    <script>
        // Phân quyền người dùng
        function grandReader(e) {
            const CONFIRM = confirm('Bạn muốn chuyển người này thành người dùng thông thường?');
            if (CONFIRM) {
                let id = e.getAttribute('data-id');
                axios.put('user/' + id + '/reader')
                    .then((result) => {
                        e.parentElement.parentElement.remove();
                        let tbody = document.querySelector('tbody#reader-table');
                        tbody.innerHTML = result.data;
                    }).catch((err) => {
                        console.error(err);
                    });
            }
        }

        // Phân quyền mod
        function grandMod(e) {
            const CONFIRM = confirm('Bạn muốn chuyển người này thành người quản lý?');
            if (CONFIRM) {
                let id = e.getAttribute('data-id');
                axios.put('user/' + id + '/mod')
                    .then((result) => {
                        e.parentElement.parentElement.remove();
                        let tbody = document.querySelector('tbody#mod-table');
                        tbody.innerHTML = result.data;
                    }).catch((err) => {
                        console.error(err);
                    });
            }
        }

        // Phân quyền admin
        function grandAdmin(e) {
            const CONFIRM = confirm('Bạn muốn chuyển người này thành quản trị viên?');
            if (CONFIRM) {
                let id = e.getAttribute('data-id');
                axios.put('user/' + id + '/admin')
                    .then((result) => {
                        e.parentElement.parentElement.remove();
                        let tbody = document.querySelector('tbody#admin-table');
                        tbody.innerHTML = result.data;
                    }).catch((err) => {
                        console.error(err);
                    });
            }
        }

        // Xoá người dùng
        function deleteUser(e) {
            const CONFIRM = confirm('Bạn muốn xoá người này?');
            if (CONFIRM) {
                let id = e.getAttribute('data-id');
                axios.put('user/' + id + '/delete')
                    .then((result) => {
                        e.parentElement.parentElement.className = "user-row hidden";
                        e.parentElement.innerHTML = result.data;
                    }).catch((err) => {
                        console.error(err);
                    });
            }
        }

        $(function() {
            $('#user-search-input').keyup(function() {
                var value = $(this).val().toLowerCase();
                console.log(value);
                $("tr.user-row").filter(function() {
                    $(this).toggle($(this).text().toLowerCase().indexOf(value) > -1)
                });
            })

            $('#hideDeletedUser').change(function() {
                if ($(this).val() == 'hidden') {
                    $('tr.user-row.hidden').hide();
                    $(this).val('visible');
                } else {
                    $('tr.user-row.hidden').show();
                    $(this).val('hidden');
                }
            })
        })
    </script>
@endpush
