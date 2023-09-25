<!-- Main Sidebar Container -->
<aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Sidebar -->
    <div class="sidebar">

        <!-- /.sidebar -->
        <ul class="pt-3 nav nav-pills nav-sidebar flex-column" data-widget="tree view" role="menu"
            data-accordion="false">
            <!-- Add icons to the links using the .nav-icon class
                 with font-awesome or any other icon font library -->
            <li class="nav-item">
                <a href="{{route('personal.main.index')}}" class="nav-link">
                    <i class="nav-icon fas fa-home" style="color: #77767b;"></i>
                    <p>
                        Главная страница
                    </p>
                </a>
            </li>
            <li class="nav-item">
                <a href="{{route('personal.like.index')}}" class="nav-link">
                    <i class="nav-icon far fa-heart" style="color: #77767b;"></i>
                    <p>
                        Понравившиеся посты
                    </p>
                </a>
            </li>
            <li class="nav-item">
                <a href="{{route('personal.commentary.index')}}" class="nav-link">
                    <i class="nav-icon fas fa-comments" style="color: #77767b;"></i>
                    <p>
                        Комментарий
                    </p>
                </a>
            </li>
        </ul>
    </div>
</aside>
