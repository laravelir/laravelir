<div class="nav-item dropdown">
    <a href="#" class="nav-link d-flex lh-1 text-reset p-0" data-bs-toggle="dropdown"
        aria-label="Open user menu">
        <span class="avatar avatar-sm" style="background-image: url({{ user()->avatar }})"></span>
        <div class="d-none d-xl-block ps-2">
            <div>{{ user()->username }}</div>
            <div class="mt-1 small text-muted">{{ user()->full_name }} - مدیر</div>
        </div>
    </a>
    <div class="dropdown-menu dropdown-menu-end dropdown-menu-arrow">
        <a href="{{ route('webmaster.index') }}" class="dropdown-item">پنل مدیریت</a>
        <a href="#" class="dropdown-item">پروفایل</a>
        <div class="dropdown-divider"></div>
        <a href="#" class="dropdown-item">تنظیمات</a>
        <a href="{{ route('auth.logout') }}" class="dropdown-item">خروج</a>
    </div>
</div>
