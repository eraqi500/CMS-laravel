

<li class="nav-item">
    <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseAdmin" aria-expanded="true" aria-controls="collapseAdmin">
        <i class="fas fa-fw fa-cog"></i>
        <span> Admin </span>
    </a>
    <div id="collapseAdmin" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
        <div class="bg-white py-2 collapse-inner rounded">
            <h6 class="collapse-header"> Users </h6>
            <a class="collapse-item" href="{{route('users.create')}}"> Create  Users </a>
            <a class="collapse-item" href="/admin/edwin/users"> View Users </a>
        </div>
    </div>
</li>
