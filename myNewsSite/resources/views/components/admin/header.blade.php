    
<header class="navbar navbar-dark sticky-top bg-dark flex-md-nowrap p-0 shadow">
  <a class="navbar-brand col-md-3 col-lg-2 me-0 px-3 fs-6" href="#">News Aggregator</a>
  <button class="navbar-toggler position-absolute d-md-none collapsed" type="button" data-bs-toggle="collapse" 
            data-bs-target="#sidebarMenu" aria-controls="sidebarMenu" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>
  <input class="form-control form-control-dark w-100 rounded-0 border-0" type="text" placeholder="Поиск" aria-label="Search">
  <div class="navbar-nav">
    <div class="nav-item text-nowrap">
      <a class="nav-link px-3" href="#">Выход</a>
    </div>
  </div>
</header>

{{-- Временная панель --}}
<ul class="nav justify-content-center">
  <ul class="nav">
    <li class="nav-item">
      <a class="nav-link" aria-current="page" href="{{ route('sitePage.homePage') }}">
        <strong>Главная</strong>
        </a>
    </li>
    <li class="nav-item">
      <a class="nav-link" href="{{ route('sitePage.categoryNewsPage') }}">
        <strong>Категории новостей</strong>
        </a>
    </li>
    <li class="nav-item">
      <a class="nav-link" href="{{ route('news.index') }}">
        <strong>Новости</strong>
        </a>
    </li>
    <li class="nav-item">
      <a class="nav-link" href="{{ route('admin.index') }}">
        <strong>Админка</strong>
        </a>
    </li>
  </ul>
</ul>