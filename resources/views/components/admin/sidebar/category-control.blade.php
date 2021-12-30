

<li class="nav-item">
    <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseCate" aria-expanded="true" aria-controls="collapseCate">
        <i class="fas fa-fw fa-cog"></i>
        <span> Categories </span>
    </a>
    <div id="collapseCate" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
        <div class="bg-white py-2 collapse-inner rounded">
            <h6 class="collapse-header"> Category </h6>
            <a class="collapse-item" href="{{route('categories.create')}}"> Create  Category </a>
            <a class="collapse-item" href="{{route('categories.index')}}"> View Category </a>
        </div>
    </div>
</li>
