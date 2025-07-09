<nav class="navbar navbar-expand-lg navbar-light bg-light shadow-sm">
  <div class="container">
    <a class="navbar-brand" href="{{ url('dashboard') }}">
      دوکان دکوریشن
    </a>

    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" 
      aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="تغییر ناوبری">
      <span class="navbar-toggler-icon"></span>
    </button>

    <div class="collapse navbar-collapse" id="navbarSupportedContent">
      <ul class="navbar-nav me-auto mb-2 mb-lg-0">
        <li class="nav-item">
          <a class="nav-link" href="{{ route('dashboard') }}">داشبورد</a>
        </li>

        <li class="nav-item">
          <a class="nav-link" href="{{ route('customers.index') }}">مشتریان</a>
        </li>

        <li class="nav-item">
          <a class="nav-link" href="{{ route('products.index') }}">محصولات</a>
        </li>

        <li class="nav-item">
          <a class="nav-link" href="{{ route('sales.index') }}">فروش‌ها</a>
        </li>

        <li class="nav-item">
          <a class="nav-link" href="{{ route('payments.index') }}">پرداخت‌ها</a>
        </li>

        <li class="nav-item">
          <a class="nav-link" href="{{ route('debts') }}">بدهی‌ها</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="{{ route('expenses.index') }}">هزینه ها</a>
        </li>
      </ul>

      <ul class="navbar-nav ms-auto">
        @auth
        <li class="nav-item dropdown">
          <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" 
             data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
            {{ auth()->user()->name }}
          </a>

          <div class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
            <a class="dropdown-item" href="{{ route('logout') }}"
               onclick="event.preventDefault();
                         document.getElementById('logout-form').submit();">
              خروج
            </a>

            <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
              @csrf
            </form>
          </div>
        </li>
        @else
        <li class="nav-item">
          <a class="nav-link" href="{{ route('login') }}">ورود</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="{{ route('register') }}">ثبت نام</a>
        </li>
        @endauth
      </ul>
    </div>
  </div>
</nav>
