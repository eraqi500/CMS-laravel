

<li class="nav-item">
    <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseNewPost" aria-expanded="true" aria-controls="collapseNewPost">
        <i class="fas fa-fw fa-cog"></i>
        <span> New Posts </span>
    </a>
    <div id="collapseNewPost" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
        <div class="bg-white py-2 collapse-inner rounded">
            <h6 class="collapse-header"> Posts </h6>
            <a class="collapse-item" href="{{route('newposts.create')}}"> Create  Posts </a>
            <a class="collapse-item" href="{{'/admin/newposts/'}}"> View posts </a>
            <a class="collapse-item" href="{{route('comments.index')}}"> All  Comments </a>
        </div>
    </div>
</li>
