<div class="nav-item dropdown">
    <a href="#" class="nav-link d-flex lh-1 text-reset p-0" data-bs-toggle="dropdown" aria-label="Open user menu">
        <span class="avatar avatar-sm" style="background-image: url({{ user()->avatar }})"></span>
        <div class="d-none d-xl-block ps-2">
            <div>{{ user()->username }}</div>
            <div class="mt-1 small text-muted">{{ user()->full_name }} - مدیر</div>
        </div>
    </a>
    <div class="dropdown-menu dropdown-menu-end dropdown-menu-arrow">
        @if (user()->is_admin)
            <a href="{{ route('webmaster.index') }}" class="dropdown-item">پنل مدیریت</a>
        @endif

        <a href="{{ user()->url() }}" class="dropdown-item">پروفایل</a>
        <a href="{{ route('account.index') }}" class="dropdown-item">حساب کاربری</a>
        <a href="{{ route('site.index') }}" class="dropdown-item">ثبت پروژه</a>
        <a href="{{ route('site.index') }}" class="dropdown-item">گفتگو ها</a>
        <div class="dropdown-divider"></div>
        <a href="{{ route('site.index') }}" class="dropdown-item">تنظیمات</a>
        <a href="{{ route('auth.logout') }}" class="dropdown-item">خروج</a>
    </div>
</div>
