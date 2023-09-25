<!-- Main Sidebar Container -->
<aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Sidebar -->
    <div class="sidebar">

    <!-- /.sidebar -->
    <ul class="pt-3 nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
        <!-- Add icons to the links using the .nav-icon class
             with font-awesome or any other icon font library -->
        <li class="nav-item">
            <a href="{{route('admin.main.index')}}" class="nav-link">
                <i class="nav-icon fas fa-home" style="color: #77767b;"></i>
                <p>
                    Главная страница
                </p>
            </a>
        </li>
        <li class="nav-item">
            <a href="{{route('admin.user.index')}}" class="nav-link">
                <i class="nav-icon fas fa-users" style="color: #77767b;"></i>
                <p>
                    Пользователи
                </p>
            </a>
        </li>
        <li class="nav-item">
            <a href="{{route('admin.category.index')}}" class="nav-link">
                <i class="nav-icon fas fa-th" style="color: #77767b;"></i>
                <p>
                    Категории
                </p>
            </a>
        </li>
        <li class="nav-item">
            <a href="{{route('admin.tag.index')}}" class="nav-link">
                <i class="nav-icon fas fa-hashtag" style="color: #77767b;"></i>
                <p>
                    Тэги
                </p>
            </a>
        </li>
        <li class="nav-item">
            <a href="{{route('admin.post.index')}}" class="nav-link">
                <i class="nav-icon fas fa-mail-bulk" style="color: #77767b;"></i>
                <p>
                    Посты
                </p>
            </a>
        </li>
    </ul>
    </div>
</aside>
