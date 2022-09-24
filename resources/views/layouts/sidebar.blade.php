<div class="sidebar" >

    @can('viewAny', 'App\\Models\User')
        <div class="sidebar__item">
            <a class="{{ Request::is('users') ? 'sidebar__item--active' : '' }}" href="{{ route('users.index') }}">
                Quản lý người dùng
            </a>
        </div>
    @endcan
    <div class="sidebar__item">
        <a class="{{ Request::is('member-subscribe') ? 'sidebar__item--active' : '' }}" href="{{ route('member-subscribe') }}">
            Quản lý thành viên nhận email
        </a>
    </div>
    @can('viewAny', 'App\\Models\Post')
        <div  class="sidebar__item">
            <a class="{{ Request::is('posts') ? 'sidebar__item--active' : '' }}" href="{{ route('posts.index') }}">
                Quản lý bài viết
            </a>
        </div>
    @endcan
    <div  class="sidebar__item">
        <a class="{{ Request::is('products') ? 'sidebar__item--active' : '' }}" href="{{ route('products.index') }}">
            Quản lý sản phẩm
        </a>
    </div>
    <div  class="sidebar__item">
        <a class="{{ Request::is('contacts') ? 'sidebar__item--active' : '' }}" href="{{ route('contacts.index') }}">
            Quản lý liên hệ của KH
        </a>
    </div>

    @can('viewAny', 'App\\Models\Category')
        <div  class="sidebar__item">
            <a class="{{ Request::is('categories') ? 'sidebar__item--active' : '' }}" href="{{ route('categories.index') }}">
                Quản lý danh mục
            </a>
        </div>
    @endcan

    @can('viewAny', 'App\\Models\Permission')
        <div class="sidebar__item">
            <a  class="{{ Request::is('permissions') ? 'sidebar__item--active' : '' }}" href="{{ route('permissions.index') }}">
                Quản lý quyền
            </a>
        </div>
    @endcan

    @can('viewAny', 'App\\Models\Role')
        <div  class="sidebar__item">
            <a class="{{ Request::is('roles') ? 'sidebar__item--active' : '' }}" href="{{ route('roles.index') }}">
                Quản lý vai trò
            </a>
        </div>
    @endcan

</div>
