<nav class="navbar navbar-light navbar-vertical navbar-expand-xl">
  <script>
    var navbarStyle = localStorage.getItem("navbarStyle");
    if (navbarStyle && navbarStyle !== 'transparent') {
      document.querySelector('.navbar-vertical').classList.add(`navbar-${navbarStyle}`);
    }
  </script>
  <div class="d-flex align-items-center">
    <div class="toggle-icon-wrapper">

      <button class="btn navbar-toggler-humburger-icon navbar-vertical-toggle" 
      data-bs-toggle="tooltip" data-bs-placement="left" title="Toggle Navigation">
      <span class="navbar-toggle-icon"><span class="toggle-line"></span></span></button>

    </div>
    <a class="navbar-brand" href="{{ route('admin.dashboard') }}">
      <div class="d-flex align-items-center py-3"><img class="me-2" 
        src="{{ asset('assets/icons/android-icon-48x48.png') }}" alt="" width="40" />
        <span class="font-sans-serif">acfa</span>
      </div>
    </a>
  </div>

  <div class="collapse navbar-collapse" id="navbarVerticalCollapse">
    <div class="navbar-vertical-content scrollbar">
      <ul class="navbar-nav flex-column mb-3" id="navbarVerticalNav">
        <li class="nav-item">
          <a class="nav-link" href="{{ route('admin.dashboard') }}" role="button" aria-expanded="false">
            <div class="d-flex align-items-center"><span class="nav-link-icon">
              <span class="fas fa-chart-pie"></span></span><span class="nav-link-text ps-1 fs-1">Dashboard</span>
            </div>
          </a>
        </li>


        <li class="nav-item">
          <a class="nav-link" href="{{ route('admin.news.index') }}" role="button" aria-expanded="false">
            <div class="d-flex align-items-center"><span class="nav-link-icon">
              <span class="fas fa-bars"></span></span>
              <span class="nav-link-text ps-1 fs-1">News</span>
            </div>
          </a>
        </li>

        <li class="nav-item">
          <a class="nav-link" href="{{ route('admin.trainer.index') }}" role="button" aria-expanded="false">
            <div class="d-flex align-items-center"><span class="nav-link-icon">
              <span class="fas fa-bars"></span></span>
              <span class="nav-link-text ps-1 fs-1">Trainers</span>
            </div>
          </a>
        </li>

        <li class="nav-item">
          <a class="nav-link dropdown-indicator" href="#dashboard" role="button"
           data-bs-toggle="collapse" aria-expanded="false" aria-controls="dashboard">
            <div class="d-flex align-items-center">
              <span class="nav-link-icon"><span class="fas fa-bars">
                </span></span><span class="nav-link-text ps-1 fs-1">Courses</span>
            </div>
          </a>
          <ul class="nav collapse" id="dashboard">
            <li class="nav-item"><a class="nav-link" href="{{ route('admin.category.index') }}" aria-expanded="false">
                <div class="d-flex align-items-center">
                  <span class="nav-link-text ps-1 fs-0">Course Categories</span>
                </div>
              </a>
            </li>
            <li class="nav-item"><a class="nav-link" href="{{ route('admin.course.index') }}" aria-expanded="false">
              <div class="d-flex align-items-center">
                <span class="nav-link-text ps-1 fs-0">Courses</span>
              </div>
            </a>
          </li>
          </ul>
        </li>

        <li class="nav-item">
          <a class="nav-link dropdown-indicator" href="#exams" role="button"
           data-bs-toggle="collapse" aria-expanded="false" aria-controls="exams">
            <div class="d-flex align-items-center">
              <span class="nav-link-icon"><span class="fas fa-bars">
                </span></span><span class="nav-link-text ps-1 fs-1">Exams</span>
            </div>
          </a>
          <ul class="nav collapse" id="exams">
            <li class="nav-item"><a class="nav-link" href="{{ route('admin.exam.index') }}" aria-expanded="false">
                <div class="d-flex align-items-center">
                  <span class="nav-link-text ps-1 fs-0">Exams</span>
                </div>
              </a>
            </li>
            <li class="nav-item"><a class="nav-link" href="{{ route('admin.question.index') }}" aria-expanded="false">
              <div class="d-flex align-items-center">
                <span class="nav-link-text ps-1 fs-0">Questions</span>
              </div>
            </a>
            </li>
          </ul>
        </li>

        <li class="nav-item">
          <a class="nav-link" href="{{ route('admin.scoreResult.index') }}" role="button" aria-expanded="false">
            <div class="d-flex align-items-center"><span class="nav-link-icon">
              <span class="fas fa-bars"></span></span>
              <span class="nav-link-text ps-1 fs-1">Score Results</span>
            </div>
          </a>
        </li>

        <li class="nav-item">
          <a class="nav-link" href="{{ route('admin.certificateId.index') }}" role="button" aria-expanded="false">
            <div class="d-flex align-items-center"><span class="nav-link-icon">
              <span class="fas fa-bars"></span></span>
              <span class="nav-link-text ps-1 fs-1">Certification</span>
            </div>
          </a>
        </li>

        <li class="nav-item">
          <a class="nav-link" href="{{ route('admin.user.index') }}" role="button" aria-expanded="false">
            <div class="d-flex align-items-center"><span class="nav-link-icon">
              <span class="fas fa-bars"></span></span>
              <span class="nav-link-text ps-1 fs-1">Students</span>
            </div>
          </a>
        </li>

        

      </ul>
    </div>
  </div>
</nav>