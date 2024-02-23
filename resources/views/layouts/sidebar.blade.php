<div class="l-navbar show" id="nav-bar">
    <nav class="nav sidebar">
        <div>
            <a href="#" >
                <img src="{{ asset('/assets/images/waveanalytical 2.png') }}" alt="Logo" style="width: 80%;margin-left: 11%;margin-top: -4%;" >

            </a>

            <div class="nav_list">
                <div class="nav_div">
                    <a href="{{route('dashboard')}}" class="nav_link active" style="margin-top: 31%">
                        <i class="bx bx-grid-alt nav_icon"><svg xmlns="http://www.w3.org/2000/svg" width="24"
                                height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"
                                stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-layout-dashboard">
                                <rect width="7" height="9" x="3" y="3" rx="1" />
                                <rect width="7" height="5" x="14" y="3" rx="1" />
                                <rect width="7" height="9" x="14" y="12" rx="1" />
                                <rect width="7" height="5" x="3" y="16" rx="1" />
                            </svg></i>
                        <span class="nav_name" style="font-size: 22px;">Dashboard</span>
                    </a>
                </div>
                <div class="dropdown nav_div">
                    <a class="menu_link dropdown-toggle nav_link" role="button" id="dropdownMenuClickableInside"
                        data-bs-toggle="dropdown" data-bs-auto-close="outside" aria-expanded="false">
                        <i class="bx bx-user nav_icon"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"
                                stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-newspaper">
                                <path
                                    d="M4 22h16a2 2 0 0 0 2-2V4a2 2 0 0 0-2-2H8a2 2 0 0 0-2 2v16a2 2 0 0 1-2 2Zm0 0a2 2 0 0 1-2-2v-9c0-1.1.9-2 2-2h2" />
                                <path d="M18 14h-8" />
                                <path d="M15 18h-5" />
                                <path d="M10 6h8v4h-8V6Z" />
                            </svg></i>
                        <span class="nav_name" style="font-size: 22px;">Product <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"
                                stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-chevron-down">
                                <path d="m6 9 6 6 6-6" />
                            </svg></span>
                    </a>
                    <ul class="dropdown-menu innerDropdown" aria-labelledby="dropdownMenuClickableInside" style="border: transparent;">
                        <li>
                            <a href={{route('product.create')}} class="nav_link" style="column-gap: 0rem;">
                                <i class="bx bx-grid-alt nav_icon">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-file-search"><path d="M4 22h14a2 2 0 0 0 2-2V7.5L14.5 2H6a2 2 0 0 0-2 2v3"/><polyline points="14 2 14 8 20 8"/><path d="M5 17a3 3 0 1 0 0-6 3 3 0 0 0 0 6z"/><path d="m9 18-1.5-1.5"/></svg>
                                </i>
                                <span class="nav_name" style="font-size: 18px;" >Add Product</span>
                            </a>
                            </a>

                            
                        </li>
                        <li>
                            <a href={{route('product')}} class="nav_link" style="column-gap: 0rem;">
                                <i class="bx bx-grid-alt nav_icon">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-file-plus-2"><path d="M4 22h14a2 2 0 0 0 2-2V7.5L14.5 2H6a2 2 0 0 0-2 2v4"/><polyline points="14 2 14 8 20 8"/><path d="M3 15h6"/><path d="M6 12v6"/></svg>
                                </i>
                                <span class="nav_name" style="font-size: 18px;">List Product</span>
                            </a>
                            </a>
                        </li>
                    </ul>
                </div>

                <div class="dropdown nav_div">
                    <a class="menu_link dropdown-toggle nav_link" role="button" id="dropdownMenuClickableInside"
                        data-bs-toggle="dropdown" data-bs-auto-close="outside" aria-expanded="false">
                        <i class="bx bx-user nav_icon"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"
                                stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-newspaper">
                                <path
                                    d="M4 22h16a2 2 0 0 0 2-2V4a2 2 0 0 0-2-2H8a2 2 0 0 0-2 2v16a2 2 0 0 1-2 2Zm0 0a2 2 0 0 1-2-2v-9c0-1.1.9-2 2-2h2" />
                                <path d="M18 14h-8" />
                                <path d="M15 18h-5" />
                                <path d="M10 6h8v4h-8V6Z" />
                            </svg></i>
                        <span class="nav_name" style="font-size: 22px;">Category<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"
                                stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-chevron-down">
                                <path d="m6 9 6 6 6-6" />
                            </svg></span>
                    </a>
                    <ul class="dropdown-menu innerDropdown" aria-labelledby="dropdownMenuClickableInside" style="border: transparent;">
                        <li>
                            <a href={{route('category.create')}} class="nav_link" style="column-gap: 0rem;">
                                <i class="bx bx-grid-alt nav_icon">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-file-search"><path d="M4 22h14a2 2 0 0 0 2-2V7.5L14.5 2H6a2 2 0 0 0-2 2v3"/><polyline points="14 2 14 8 20 8"/><path d="M5 17a3 3 0 1 0 0-6 3 3 0 0 0 0 6z"/><path d="m9 18-1.5-1.5"/></svg>
                                </i>
                                <span class="nav_name" style="font-size: 18px;" >Add Category</span>
                            </a>
                            </a>

                            
                        </li>
                        <li>
                            <a href={{route('category')}} class="nav_link" style="column-gap: 0rem;">
                                <i class="bx bx-grid-alt nav_icon">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-file-plus-2"><path d="M4 22h14a2 2 0 0 0 2-2V7.5L14.5 2H6a2 2 0 0 0-2 2v4"/><polyline points="14 2 14 8 20 8"/><path d="M3 15h6"/><path d="M6 12v6"/></svg>
                                </i>
                                <span class="nav_name" style="font-size: 18px;">List category</span>
                            </a>
                            </a>
                        </li>
                    </ul>
                </div>
          

            </div>
        </div>

        <form method="POST" action="{{ route('logout') }}">
            @method('post')
            @csrf
            <a href="route('logout')" class="nav_link" onclick="event.preventDefault(); this.closest('form').submit();">
                <i class="bx bx-log-out nav_icon"></i>
                <span class="nav_name">SignOut</span>
            </a>
        </form>
    </nav>
</div>