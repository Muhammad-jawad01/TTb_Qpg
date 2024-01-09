<nav id="sidebar">
    <ul class="navbar-item theme-brand flex-row  text-center">
        <li class="nav-item theme-logo">
            <a href="{{ route('home') }}">
                <img src="{{ url('assets/img/logo-1.png') }}" style="height:80% ;width: 80%; " class="navbar-logo"
                    alt="logo">

            </a>

        </li>
        <li class="nav-item theme-text">
            <a href="{{ url('/') }}" class="nav-link"> </a>
        </li>
    </ul>
    <ul class="list-unstyled menu-categories" id="accordionExample">
        <li class="menu {{ active_class(['app/dashboard']) }}">
            <a data-active="{{ is_active_route(['app/dashboard']) }}" href="{{ url('/app/dashboard') }}"
                aria-expanded="false" class="dropdown-toggle">
                <div class="">
                    <i class="las la-home"></i>
                    <span> {{ __('Dashboard') }}</span>
                </div>
            </a>
        </li>

        {{--  <li class="menu">
            <a href="#dashboard" data-active="{{ is_active_route(['dashboard/*']) }}" data-toggle="collapse"
                aria-expanded="{{ is_active_route(['dashboard/*']) }}" class="dropdown-toggle">
                <div class="">
                    <i class="las la-home"></i>
                    <span>{{ __('Dashboards') }}</span>
                </div>
                <div>
                    <i class="las la-angle-right sidemenu-right-icon"></i>
                </div>
            </a>
            <ul class="submenu list-unstyled collapse {{ show_class(['app/*']) }}" id="dashboard"
                data-parent="#accordionExample">
                <li class=" {{ active_class(['app/dashboard']) }}">
                    <a data-active="{{ is_active_route(['app/dashboard']) }}" href="{{ url('/app/dashboard') }}">
                        {{ __('Dashboard') }} </a>
                </li>

            </ul>
        </li>  --}}
        <!-- <li class="menu">
            <a href="#app" data-active="{{ is_active_route(['apps/*']) }}" data-toggle="collapse" aria-expanded="{{ is_active_route(['apps/*']) }}" class="dropdown-toggle">
                <div class="">
                    <i class="lab la-medapps"></i>
                    <span>{{ __('Apps') }}</span>
                </div>
                <div>
                    <i class="las la-angle-right sidemenu-right-icon"></i>
                </div>
            </a>
            <ul class="collapse submenu list-unstyled {{ show_class(['apps/*']) }}" id="app" data-parent="#accordionExample">
                <li class=" {{ active_class(['apps/calendar']) }}">
                    <a data-active="{{ is_active_route(['apps/calendar']) }}" href="{{ url('/apps/calendar') }}">
                        {{ __('Calendar') }} </a>
                </li>
                <li class=" {{ active_class(['apps/chat']) }}">
                    <a data-active="{{ is_active_route(['apps/chat']) }}" href="{{ url('/apps/chat') }}">
                        {{ __('Chat') }} </a>
                </li>
                <li class=" {{ active_class(['apps/companies/*']) }}">
                    <a href="#pages-companies" data-active="{{ is_active_route(['apps/companies/*']) }}" data-toggle="collapse" aria-expanded="{{ is_active_route(['apps/companies/*']) }}" class="dropdown-toggle"> {{ __('Companies') }} <i class="las la-angle-right sidemenu-right-icon"></i> </a>
                    <ul class="collapse list-unstyled sub-submenu {{ show_class(['apps/companies/*']) }}" id="pages-companies" data-parent="#pages">
                        <li>
                            <a data-active="{{ is_active_route(['apps/companies/list']) }}" href="{{ url('/apps/companies/lists') }}"> {{ __('List') }} </a>
                        </li>
                        <li>
                            <a data-active="{{ is_active_route(['apps/companies/company-details']) }}" href="{{ url('/apps/companies/company-details') }}"> {{ __('Company Details') }} </a>
                        </li>
                    </ul>
                </li>
                <li class=" {{ active_class(['apps/contacts']) }}">
                    <a data-active="{{ is_active_route(['apps/contacts']) }}" href="{{ url('/apps/contacts') }}">
                        {{ __('Contacts') }} </a>
                </li>
                <li class=" {{ active_class(['apps/ecommerce/*']) }}">
                    <a href="#pages-ecommerce" data-active="{{ is_active_route(['apps/ecommerce/*']) }}" data-toggle="collapse" aria-expanded="{{ is_active_route(['apps/ecommerce/*']) }}" class="dropdown-toggle"> {{ __('Ecommerce') }} <i class="las la-angle-right sidemenu-right-icon"></i> </a>
                    <ul class="collapse list-unstyled sub-submenu {{ show_class(['apps/ecommerce/*']) }}" id="pages-ecommerce" data-parent="#pages">
                        <li>
                            <a data-active="{{ is_active_route(['apps/ecommerce/dashboard']) }}" href="{{ url('/apps/ecommerce/dashboard') }}"> {{ __('Dashboard') }} </a>
                        </li>
                        <li>
                            <a data-active="{{ is_active_route(['apps/ecommerce/products']) }}" href="{{ url('/apps/ecommerce/products') }}"> {{ __('Products') }} </a>
                        </li>
                        <li>
                            <a data-active="{{ is_active_route(['apps/ecommerce/product-details']) }}" href="{{ url('/apps/ecommerce/product-details') }}"> {{ __('Product Details') }} </a>
                        </li>
                        <li>
                            <a data-active="{{ is_active_route(['apps/ecommerce/add-product']) }}" href="{{ url('/apps/ecommerce/add-product') }}"> {{ __('Add Product') }}</a>
                        </li>
                        <li>
                            <a data-active="{{ is_active_route(['apps/ecommerce/orders']) }}" href="{{ url('/apps/ecommerce/orders') }}"> {{ __('Orders') }} </a>
                        </li>
                        <li>
                            <a data-active="{{ is_active_route(['apps/ecommerce/order-details']) }}" href="{{ url('/apps/ecommerce/order-details') }}"> {{ __('Order Details') }} </a>
                        </li>
                        <li>
                            <a data-active="{{ is_active_route(['apps/ecommerce/customers']) }}" href="{{ url('/apps/ecommerce/customers') }}"> {{ __('Customers') }} </a>
                        </li>
                        <li>
                            <a data-active="{{ is_active_route(['apps/ecommerce/sellers']) }}" href="{{ url('/apps/ecommerce/sellers') }}"> {{ __('Sellers') }} </a>
                        </li>
                        <li>
                            <a data-active="{{ is_active_route(['apps/ecommerce/cart']) }}" href="{{ url('/apps/ecommerce/cart') }}"> {{ __('Cart') }} </a>
                        </li>
                        <li>
                            <a data-active="{{ is_active_route(['apps/ecommerce/checkout']) }}" href="{{ url('/apps/ecommerce/checkout') }}"> {{ __('Checkout') }} </a>
                        </li>
                    </ul>
                </li>
                <li class=" {{ active_class(['apps/email/*']) }}">
                    <a href="#pages-email" data-active="{{ is_active_route(['apps/email/*']) }}" data-toggle="collapse" aria-expanded="{{ is_active_route(['apps/email/*']) }}" class="dropdown-toggle">
                        {{ __('Email') }} <i class="las la-angle-right sidemenu-right-icon"></i> </a>
                    <ul class="collapse list-unstyled sub-submenu {{ show_class(['apps/email/*']) }}" id="pages-email" data-parent="#pages">
                        <li>
                            <a data-active="{{ is_active_route(['apps/email/inbox']) }}" href="{{ url('/apps/email/inbox') }}"> {{ __('Inbox') }} </a>
                        </li>
                        <li>
                            <a data-active="{{ is_active_route(['apps/email/details']) }}" href="{{ url('/apps/email/details') }}"> {{ __('Email Details') }} </a>
                        </li>
                        <li>
                            <a data-active="{{ is_active_route(['apps/email/compose']) }}" href="{{ url('/apps/email/compose') }}"> {{ __('Compose Email') }} </a>
                        </li>
                    </ul>
                </li>
                <li class=" {{ active_class(['apps/file-manager']) }}">
                    <a data-active="{{ is_active_route(['apps/file-manager']) }}" href="{{ url('/apps/file-manager') }}"> {{ __('File Manager') }} </a>
                </li>
                <li class=" {{ active_class(['apps/invoice-list']) }}">
                    <a data-active="{{ is_active_route(['apps/invoice-list']) }}" href="{{ url('/apps/invoice-list') }}"> {{ __('Invoice List') }} </a>
                </li>
                <li class=" {{ active_class(['apps/notes/*']) }}">
                    <a href="#pages-notes" data-active="{{ is_active_route(['apps/notes/*']) }}" data-toggle="collapse" aria-expanded="{{ is_active_route(['apps/notes/*']) }}" class="dropdown-toggle"> {{ __('Notes') }} <i class="las la-angle-right sidemenu-right-icon"></i> </a>
                    <ul class="collapse list-unstyled sub-submenu {{ show_class(['apps/notes/*']) }}" id="pages-notes" data-parent="#pages">
                        <li>
                            <a data-active="{{ is_active_route(['apps/notes/list']) }}" href="{{ url('/apps/notes/list') }}"> {{ __('List') }} </a>
                        </li>
                        <li>
                            <a data-active="{{ is_active_route(['apps/notes/details']) }}" href="{{ url('/apps/notes/details') }}"> {{ __('Notes Details') }} </a>
                        </li>
                        <li>
                            <a data-active="{{ is_active_route(['apps/notes/create']) }}" href="{{ url('/apps/notes/create') }}"> {{ __('Create Note') }} </a>
                        </li>
                    </ul>
                </li>
                <li class=" {{ active_class(['apps/social']) }}">
                    <a data-active="{{ is_active_route(['apps/social']) }}" href="{{ url('/apps/social') }}">
                        {{ __('Social') }} </a>
                </li>
                <li class=" {{ active_class(['apps/task-list']) }}">
                    <a data-active="{{ is_active_route(['apps/task-list']) }}" href="{{ url('/apps/task-list') }}"> {{ __('Task List') }} </a>
                </li>
                <li class=" {{ active_class(['apps/tickets/*']) }}">
                    <a href="#pages-tickets" data-active="{{ is_active_route(['apps/tickets/*']) }}" data-toggle="collapse" aria-expanded="{{ is_active_route(['apps/tickets/*']) }}" class="dropdown-toggle"> {{ __('Tickets') }} <i class="las la-angle-right sidemenu-right-icon"></i> </a>
                    <ul class="collapse list-unstyled sub-submenu {{ show_class(['apps/tickets/*']) }}" id="pages-tickets" data-parent="#pages">
                        <li>
                            <a data-active="{{ is_active_route(['apps/tickets/list']) }}" href="{{ url('/apps/tickets/list') }}"> {{ __('Ticket List') }} </a>
                        </li>
                        <li>
                            <a data-active="{{ is_active_route(['apps/tickets/details']) }}" href="{{ url('/apps/tickets/details') }}"> {{ __('Ticket Details') }} </a>
                        </li>
                    </ul>
                </li>
            </ul>
        </li> -->
        <li class="menu-title"></li>
        @canany(['user-list', 'role-list'])
            <li class="menu">
                <a href="#users" data-active="{{ is_active_route(['app/user-managment/*']) }}" data-toggle="collapse"
                    aria-expanded="{{ is_active_route(['app/user-managment/*']) }}" class="dropdown-toggle">
                    <div class="">
                        <i class="las la-user-lock"></i>
                        <span>{{ __('Administration') }}</span>
                    </div>
                    <div>
                        <i class="las la-angle-right sidemenu-right-icon"></i>
                    </div>
                </a>
                <ul class="collapse submenu list-unstyled {{ show_class(['app/user-managment/*']) }}" id="users"
                    data-parent="#accordionExample">
                    @can('user-list')
                        <li>
                            <a data-active="{{ is_active_route(['app/user-managment/users', 'app/user-managment/users/*']) }}"
                                href="{{ route('users.index') }}"> {{ __('Users') }}</a>
                        </li>
                    @endcan
                    @can('role-list')
                        <li>
                            <a data-active="{{ is_active_route(['app/user-managment/roles', 'app/user-managment/roles/*']) }}"
                                href="{{ route('roles.index') }}"> {{ __('Roles') }} </a>
                        </li>
                    @endcan
                </ul>
            </li>
        @endcanany
        @canany(['branch-list', 'b-list'])
            <li class="menu">
                <a href="#branchs" data-active="{{ is_active_route(['app/branch-managment/*']) }}"
                    data-toggle="collapse" aria-expanded="{{ is_active_route(['app/branch-managment/*']) }}"
                    class="dropdown-toggle">
                    <div class="">
                        <i class="fab la-buffer"></i>

                        <span>{{ __('Branches') }}</span>
                    </div>
                    <div>
                    </div>
                </a>
                <ul class="collapse submenu list-unstyled {{ show_class(['app/branch-managment/*']) }}" id="branchs"
                    data-parent="#accordionExample">
                    @can('branch-list')
                        <li>
                            <a data-active="{{ is_active_route(['app/branch-managment/branchs', 'app/branch-managment/branchs/*']) }}"
                                href="{{ route('branch.index') }}"> {{ __('branchs') }}</a>
                        </li>
                    @endcan

                </ul>
            </li>
        @endcanany

        {{-- Genertal setting of the paper  --}}

        {{-- @can('subject-list') --}}
        <li class="menu">
            <a href="#general" data-active="{{ is_active_route(['app/General-Setting/*']) }}"
                data-toggle="collapse" aria-expanded="{{ is_active_route(['app/General-Setting/*']) }}"
                class="dropdown-toggle">
                <div class="">
                    <i class="las la-cogs"></i>
                    <span>{{ __('General Setting') }}</span>
                </div>
                <div>
                    <i class="las la-angle-right sidemenu-right-icon"></i>
                </div>
            </a>
            <ul class="collapse submenu list-unstyled {{ show_class(['app/General-Setting/*']) }}" id="general"
                data-parent="#accordionExample">
                @can('subject-list')
                    <li>
                        <a data-active="{{ is_active_route(['app/General-Setting/subjects']) }}"
                            href="{{ route('subjects.index') }}"> {{ __('Subjects') }}</a>
                    </li>
                @endcan
                @can('class-list')
                    <li>
                        <a data-active="{{ is_active_route(['app/General-Setting/classlevels']) }}"
                            href="{{ route('classlevels.index') }}"> {{ __('Class') }}</a>
                    </li>
                @endcan
                @can('chapter-list')
                    <li>
                        <a data-active="{{ is_active_route(['app/General-Setting/chapters']) }}"
                            href="{{ route('chapters.index') }}"> {{ __('Chapter') }}</a>
                    </li>
                @endcan
                @can('term-list')
                    <li>
                        <a data-active="{{ is_active_route(['app/General-Setting/terms']) }}"
                            href="{{ route('terms.index') }}"> {{ __('Term') }}</a>
                    </li>
                @endcan


            </ul>
        </li>
        {{-- @endcan --}}

        {{-- question setting of the paper  --}}

        @can('question-list')
            <li class="menu">
                <a href="#databank" data-active="{{ is_active_route(['app/Data-Bank/*']) }}" data-toggle="collapse"
                    aria-expanded="{{ is_active_route(['app/Data-Bank/*']) }}" class="dropdown-toggle">
                    <div class="">
                        <i class="las la-server"></i>
                        <span>{{ __('Data Bank') }}</span>
                    </div>
                    <div>
                        <i class="las la-angle-right sidemenu-right-icon"></i>
                    </div>
                </a>
                <ul class="collapse submenu list-unstyled {{ show_class(['app/Data-Bank/*']) }}" id="databank"
                    data-parent="#accordionExample">

                    {{-- @can('class-list')
                        <li>
                            <a data-active="{{ is_active_route(['app/Data-Bank/mcqs']) }}"
                                href="{{ route('mcqs.index') }}"> {{ __('McQ') }}</a>
                        </li>
                    @endcan
                    @can('chapter-list')
                        <li>
                            <a data-active="{{ is_active_route(['app/Data-Bank/shortQuestions']) }}"
                                href="{{ route('shortQuestions.index') }}"> {{ __('Short Question') }}</a>
                        </li>
                    @endcan --}}
                    @can('question-list')
                        <li>
                            <a data-active="{{ is_active_route(['app/Data-Bank/Questions']) }}"
                                href="{{ route('questions.index') }}"> {{ __(' Question') }}</a>
                        </li>
                    @endcan


                </ul>
            </li>
        @endcan


        {{-- paper  --}}

        @can('paper-list')
            <li class="menu">
                <a href="#paper" data-active="{{ is_active_route(['app/Paper/*']) }}" data-toggle="collapse"
                    aria-expanded="{{ is_active_route(['app/Paper/*']) }}" class="dropdown-toggle">
                    <div class="">
                        <i class="las la-copy"></i>

                        <span>{{ __('Question Paper') }}</span>
                    </div>
                    <div>
                        <i class="las la-angle-right sidemenu-right-icon"></i>
                    </div>
                </a>
                <ul class="collapse submenu list-unstyled {{ show_class(['app/Paper*']) }}" id="paper"
                    data-parent="#accordionExample">


                    @can('paper-list')
                        <li>
                            <a data-active="{{ is_active_route(['app/Paper']) }}" href="{{ route('papers.index') }}">
                                {{ __(' Question Papers') }}</a>
                        </li>
                    @endcan


                </ul>
            </li>
        @endcan
        <!-- Report Menu  -->


        @can('report-list')
            <li class="menu">
                <a href="#visitors" data-active="{{ is_active_route(['app/reports/*']) }}" data-toggle="collapse"
                    aria-expanded="{{ is_active_route(['app/reports/*']) }}" class="dropdown-toggle">
                    <div class="">
                        <i class="las la-history"></i>

                        <span>{{ __('Reports') }}</span>
                    </div>
                    <div>
                        <i class="las la-angle-right sidemenu-right-icon"></i>
                    </div>
                </a>
                <ul class="collapse submenu list-unstyled {{ show_class(['app/reports/visitors']) }}" id="visitors"
                    data-parent="#accordionExample">
                    @can('report-list')
                        <li>
                            <a data-active="{{ is_active_route(['app/reports/visitors']) }}" href="#">
                                {{ __('QPG Reports') }}</a>
                        </li>
                    @endcan

                </ul>
            </li>
        @endcan

        {{-- <li class="menu">
            <a href="#ai" data-active="{{ is_active_route(['app/AI/*']) }}" data-toggle="collapse"
                aria-expanded="{{ is_active_route(['app/AI/*']) }}" class="dropdown-toggle">
                <div class="">
                    <i class="las la-history"></i>

                    <span>{{ __('AI Module') }}</span>
                </div>
                <div>
                    <i class="las la-angle-right sidemenu-right-icon"></i>
                </div>
            </a>
            <ul class="collapse submenu list-unstyled {{ show_class(['app/AI/index/']) }}" id="ai"
                data-parent="#accordionExample">
                <li>
                    <a data-active="{{ is_active_route(['app/AI/index/']) }}" href="#">
                        {{ __('QPG AI Module') }}</a>
                </li>

            </ul>
        </li> --}}

        <li class="menu">
            <a href="#ai" data-active="{{ is_active_route(['app/AI/*']) }}" data-toggle="collapse"
                aria-expanded="{{ is_active_route(['app/AI/*']) }}" class="dropdown-toggle">
                <div>
                    <i class="las la-history"></i>
                    <span>{{ __('AI Module') }}</span>
                </div>
                <div>
                    <i class="las la-angle-right sidemenu-right-icon"></i>
                </div>
            </a>
            <ul class="collapse submenu list-unstyled {{ show_class(['app/AI/index/']) }}" id="ai"
                data-parent="#accordionExample">
                <li>
                    <a data-active="{{ is_active_route(['app/AI/index/']) }}"
                        href="{{ route('ai.question.list') }}">
                        {{ __('QPG AI Module') }}
                    </a>
                </li>

                <li>
                    <a data-active="{{ is_active_route(['app/AI/index/']) }}"
                        href="{{ route('ai.question.paper') }}">
                        {{ __('QPG AI Module paper') }}
                    </a>
                </li>


                <li>
                    <a data-active="{{ is_active_route(['app/AI/index/']) }}"
                        href="{{ route('ai.question.paper.start') }}">
                        {{ __('QPG AI Module Paper Start') }}
                    </a>
                </li>
            </ul>
        </li>





        {{-- <li class="menu">
            <a href="#pages" data-active="{{ is_active_route(['pages/*']) }}" data-toggle="collapse"
        aria-expanded="{{ is_active_route(['pages/*']) }}" class="dropdown-toggle">
        <div class="">
            <i class="las la-file"></i>
            <span> {{ __('Other Pages') }}</span>
        </div>
        <div>
            <i class="las la-angle-right sidemenu-right-icon"></i>
        </div>
        </a>
        <ul class="collapse submenu list-unstyled {{ show_class(['pages/*']) }}" id="pages" data-parent="#accordionExample">
            <li>
                <a data-active="{{ is_active_route(['pages/coming-soon']) }}" href="{{ url('/pages/coming-soon') }}"> {{ __('Coming Soon') }} </a>
            </li>
            <li>
                <a data-active="{{ is_active_route(['pages/coming-soon2']) }}" href="{{ url('/pages/coming-soon2') }}"> {{ __('Coming Soon 2') }}</a>
            </li>
            <li>
                <a data-active="{{ is_active_route(['pages/contact-us']) }}" href="{{ url('/pages/contact-us') }}"> {{ __('Contact Form') }} </a>
            </li>
            <li>
                <a data-active="{{ is_active_route(['pages/contact-us2']) }}" href="{{ url('/pages/contact-us2') }}"> {{ __('Contact Form 2') }}</a>
            </li>
            <li class=" {{ active_class(['pages/error/*']) }}">
                <a href="#pages-error" data-active="{{ is_active_route(['pages/error/*']) }}" data-toggle="collapse" aria-expanded="{{ is_active_route(['pages/error/*']) }}" class="dropdown-toggle"> {{ __('Error') }} <i class="las la-angle-right sidemenu-right-icon"></i> </a>
                <ul class="collapse list-unstyled sub-submenu {{ show_class(['pages/error/*']) }}" id="pages-error" data-parent="#pages">
                    <li>
                        <a data-active="{{ is_active_route(['pages/error/error404']) }}" href="{{ url('/pages/error/error404') }}"> 404 </a>
                    </li>
                    <li>
                        <a data-active="{{ is_active_route(['pages/error/error500']) }}" href="{{ url('/pages/error/error500') }}"> 500 </a>
                    </li>
                    <li>
                        <a data-active="{{ is_active_route(['pages/error/error503']) }}" href="{{ url('/pages/error/error503') }}"> 503 </a>
                    </li>
                    <li>
                        <a data-active="{{ is_active_route(['pages/error/maintenance']) }}" href="{{ url('/pages/error/maintenance') }}"> {{ __('Maintenance') }} </a>
                    </li>
                    <li>
                        <a data-active="{{ is_active_route(['pages/error/error404-two']) }}" href="{{ url('/pages/error/error404-two') }}"> 404 Two</a>
                    </li>
                    <li>
                        <a data-active="{{ is_active_route(['pages/error/error500-two']) }}" href="{{ url('/pages/error/error500-two') }}"> 500 Two </a>
                    </li>
                    <li>
                        <a data-active="{{ is_active_route(['pages/error/error503-two']) }}" href="{{ url('/pages/error/error503-two') }}"> {{ __('') }} 503 Two </a>
                    </li>
                    <li>
                        <a data-active="{{ is_active_route(['pages/error/maintenance-two']) }}" href="{{ url('/pages/error/maintenance-two') }}"> {{ __('Maintenance Two') }} </a>
                    </li>
                </ul>
            </li>
            <li>
                <a data-active="{{ is_active_route(['pages/faq']) }}" href="{{ url('/pages/faq') }}">
                    {{ __('FAQ') }} </a>
            </li>
            <li>
                <a data-active="{{ is_active_route(['pages/faq2']) }}" href="{{ url('/pages/faq2') }}">
                    {{ __('FAQ 2') }} </a>
            </li>
            <li>
                <a data-active="{{ is_active_route(['pages/faq3']) }}" href="{{ url('/pages/faq3') }}">
                    {{ __('FAQ 3') }} </a>
            </li>
            <li>
                <a data-active="{{ is_active_route(['pages/helpdesk']) }}" href="{{ url('/pages/helpdesk') }}"> {{ __('Helpdesk') }} </a>
            </li>
            <li>
                <a data-active="{{ is_active_route(['pages/notifications']) }}" href="{{ url('/pages/notifications') }}"> {{ __('Notifications') }} </a>
            </li>
            <li>
                <a data-active="{{ is_active_route(['pages/pricing']) }}" href="{{ url('/pages/pricing') }}">
                    {{ __('Pricing') }} </a>
            </li>
            <li>
                <a data-active="{{ is_active_route(['pages/pricing2']) }}" href="{{ url('/pages/pricing2') }}"> {{ __('Pricing 2') }}</a>
            </li>
            <li>
                <a data-active="{{ is_active_route(['pages/privacy-policy']) }}" href="{{ url('/pages/privacy-policy') }}"> {{ __('Privacy Policy') }} </a>
            </li>
            <li>
                <a data-active="{{ is_active_route(['pages/profile']) }}" href="{{ url('/pages/profile') }}">
                    {{ __('Profile') }} </a>
            </li>
            <li>
                <a data-active="{{ is_active_route(['pages/profile-edit']) }}" href="{{ url('/pages/profile-edit') }}"> {{ __('Profile Edit') }} </a>
            </li>
            <li>
                <a data-active="{{ is_active_route(['pages/search-result']) }}" href="{{ url('/pages/search-result') }}"> {{ __('Search Result') }} </a>
            </li>
            <li>
                <a data-active="{{ is_active_route(['pages/search-result2']) }}" href="{{ url('/pages/search-result2') }}"> {{ __('Search Result 2') }}</a>
            </li>
            <li>
                <a data-active="{{ is_active_route(['pages/sitemap']) }}" href="{{ url('/pages/sitemap') }}">
                    {{ __('Sitemap') }} </a>
            </li>
            <li>
                <a data-active="{{ is_active_route(['pages/timeline']) }}" href="{{ url('/pages/timeline') }}"> {{ __('Timeline') }} </a>
            </li>
        </ul>
        </li>
        <li class="menu-title"></li>
        <li class="menu">
            <a href="#components" data-active="{{ is_active_route(['basic-ui/*']) }}" data-toggle="collapse" aria-expanded="{{ is_active_route(['basic-ui/*']) }}" class="dropdown-toggle">
                <div class="">
                    <i class="las la-drafting-compass"></i>
                    <span>{{ __('Basic UI') }}</span>
                </div>
                <div>
                    <i class="las la-angle-right sidemenu-right-icon"></i>
                </div>
            </a>
            <ul class="collapse submenu list-unstyled {{ show_class(['basic-ui/*']) }}" id="components" data-parent="#accordionExample">
                <li>
                    <a data-active="{{ is_active_route(['basic-ui/accordions']) }}" href="{{ url('/basic-ui/accordions') }}"> {{ __('Accordions') }} </a>
                </li>
                <li>
                    <a data-active="{{ is_active_route(['basic-ui/animation']) }}" href="{{ url('/basic-ui/animation') }}"> {{ __('Animation') }} </a>
                </li>
                <li>
                    <a data-active="{{ is_active_route(['basic-ui/cards']) }}" href="{{ url('/basic-ui/cards') }}"> {{ __('Bootstrap Cards') }} </a>
                </li>
                <li>
                    <a data-active="{{ is_active_route(['basic-ui/carousel']) }}" href="{{ url('/basic-ui/carousel') }}"> {{ __('Carousel') }}</a>
                </li>
                <li>
                    <a data-active="{{ is_active_route(['basic-ui/countdown']) }}" href="{{ url('/basic-ui/countdown') }}"> {{ __('Countdown') }} </a>
                </li>
                <li>
                    <a data-active="{{ is_active_route(['basic-ui/counter']) }}" href="{{ url('/basic-ui/counter') }}"> {{ __('Counter') }} </a>
                </li>
                <li>
                    <a data-active="{{ is_active_route(['basic-ui/dragitems']) }}" href="{{ url('/basic-ui/dragitems') }}"> {{ __('Drag Items') }}</a>
                </li>
                <li>
                    <a data-active="{{ is_active_route(['basic-ui/lightbox']) }}" href="{{ url('/basic-ui/lightbox') }}"> {{ __('Lightbox') }} </a>
                </li>
                <li>
                    <a data-active="{{ is_active_route(['basic-ui/lightbox-sideopen']) }}" href="{{ url('/basic-ui/lightbox-sideopen') }}"> {{ __('Lightbox Side Open') }}</a>
                </li>
                <li>
                    <a data-active="{{ is_active_route(['basic-ui/list-groups']) }}" href="{{ url('/basic-ui/list-groups') }}"> {{ __('List Group') }} </a>
                </li>
                <li>
                    <a data-active="{{ is_active_route(['basic-ui/media-object']) }}" href="{{ url('/basic-ui/media-object') }}"> {{ __('Media Object') }} </a>
                </li>
                <li>
                    <a data-active="{{ is_active_route(['basic-ui/modals']) }}" href="{{ url('/basic-ui/modals') }}"> {{ __('Modals') }} </a>
                </li>
                <li>
                    <a data-active="{{ is_active_route(['basic-ui/notifications']) }}" href="{{ url('/basic-ui/notifications') }}"> {{ __('Notifications') }} </a>
                </li>
                <li>
                    <a data-active="{{ is_active_route(['basic-ui/scrollspy']) }}" href="{{ url('/basic-ui/scrollspy') }}"> {{ __('Scroll Spy') }} </a>
                </li>
                <li>
                    <a data-active="{{ is_active_route(['basic-ui/session-timeout']) }}" href="{{ url('/basic-ui/session-timeout') }}"> {{ __('Session Timeout') }} </a>
                </li>
                <li>
                    <a data-active="{{ is_active_route(['basic-ui/sweet-alerts']) }}" href="{{ url('/basic-ui/sweet-alerts') }}"> {{ __('Sweet Alerts') }} </a>
                </li>
                <li>
                    <a data-active="{{ is_active_route(['basic-ui/tabs']) }}" href="{{ url('/basic-ui/tabs') }}">
                        {{ __('Tabs') }} </a>
                </li>
                <li>
                    <a data-active="{{ is_active_route(['basic-ui/tour-tutorial']) }}" href="{{ url('/basic-ui/tour-tutorial') }}"> {{ __('Tour Tutorial') }} </a>
                </li>
            </ul>
        </li>
        <li class="menu">
            <a href="#elements" data-active="{{ is_active_route(['ui-elements/*']) }}" data-toggle="collapse" aria-expanded="{{ is_active_route(['ui-elements/*']) }}" class="dropdown-toggle">
                <div class="">
                    <i class="lab la-elementor"></i>
                    <span> UI Elements </span>
                </div>
                <div>
                    <i class="las la-angle-right sidemenu-right-icon"></i>
                </div>
            </a>
            <ul class="collapse submenu list-unstyled {{ show_class(['ui-elements/*']) }}" id="elements" data-parent="#accordionExample">
                <li>
                    <a data-active="{{ is_active_route(['ui-elements/alerts']) }}" href="{{ url('/ui-elements/alerts') }}"> {{ __('Alerts') }} </a>
                </li>
                <li>
                    <a data-active="{{ is_active_route(['ui-elements/avatar']) }}" href="{{ url('/ui-elements/avatar') }}"> {{ __('Avatar') }} </a>
                </li>
                <li>
                    <a data-active="{{ is_active_route(['ui-elements/badges']) }}" href="{{ url('/ui-elements/badges') }}"> {{ __('Badges') }} </a>
                </li>
                <li>
                    <a data-active="{{ is_active_route(['ui-elements/breadcrumbs']) }}" href="{{ url('/ui-elements/breadcrumbs') }}"> {{ __('Breadcrumbs') }} </a>
                </li>
                <li>
                    <a data-active="{{ is_active_route(['ui-elements/buttons']) }}" href="{{ url('/ui-elements/buttons') }}"> {{ __('Buttons') }} </a>
                </li>
                <li>
                    <a data-active="{{ is_active_route(['ui-elements/colors']) }}" href="{{ url('/ui-elements/colors') }}"> {{ __('Colors') }} </a>
                </li>
                <li>
                    <a data-active="{{ is_active_route(['ui-elements/dropdown']) }}" href="{{ url('/ui-elements/dropdown') }}"> {{ __('Dropdown') }} </a>
                </li>
                <li>
                    <a data-active="{{ is_active_route(['ui-elements/grid']) }}" href="{{ url('/ui-elements/grid') }}"> {{ __('Grid') }} </a>
                </li>
                <li>
                    <a data-active="{{ is_active_route(['ui-elements/jumbotron']) }}" href="{{ url('/ui-elements/jumbotron') }}"> {{ __('Jumbotron') }} </a>
                </li>
                <li>
                    <a data-active="{{ is_active_route(['ui-elements/list-group']) }}" href="{{ url('/ui-elements/list-group') }}"> {{ __('List Group') }} </a>
                </li>
                <li>
                    <a data-active="{{ is_active_route(['ui-elements/loading-spinners']) }}" href="{{ url('/ui-elements/loading-spinners') }}"> {{ __('Loading Spinners') }} </a>
                </li>
                <li>
                    <a data-active="{{ is_active_route(['ui-elements/paging']) }}" href="{{ url('/ui-elements/paging') }}"> {{ __('Paging') }} </a>
                </li>
                <li>
                    <a data-active="{{ is_active_route(['ui-elements/popovers']) }}" href="{{ url('/ui-elements/popovers') }}"> {{ __('Popovers') }} </a>
                </li>
                <li>
                    <a data-active="{{ is_active_route(['ui-elements/progress-bar']) }}" href="{{ url('/ui-elements/progress-bar') }}"> {{ __('Progress Bar') }} </a>
                </li>
                <li>
                    <a data-active="{{ is_active_route(['ui-elements/ribbons']) }}" href="{{ url('/ui-elements/ribbons') }}"> {{ __('Ribbons') }} </a>
                </li>
                <li>
                    <a data-active="{{ is_active_route(['ui-elements/tooltips']) }}" href="{{ url('/ui-elements/tooltips') }}"> {{ __('Tooltips') }} </a>
                </li>
                <li>
                    <a data-active="{{ is_active_route(['ui-elements/typography']) }}" href="{{ url('/ui-elements/typography') }}"> {{ __('Typography') }} </a>
                </li>
                <li>
                    <a data-active="{{ is_active_route(['ui-elements/video']) }}" href="{{ url('/ui-elements/video') }}"> {{ __('Video') }} </a>
                </li>
            </ul>
        </li>
        <li class="menu {{ active_class(['widgets']) }}">
            <a data-active="{{ is_active_route(['widgets']) }}" href="{{ url('/widgets') }}" aria-expanded="false" class="dropdown-toggle">
                <div class="">
                    <i class="las la-desktop"></i>
                    <span> {{ __('Widgets') }}</span>
                </div>
            </a>
        </li>
        <li class="menu {{ active_class(['tables']) }}">
            <a data-active="{{ is_active_route(['tables']) }}" href="{{ url('/tables') }}" aria-expanded="false" class="dropdown-toggle">
                <div class="">
                    <i class="las la-border-all"></i>
                    <span> {{ __('Tables') }}</span>
                </div>
            </a>
        </li>
        <li class="menu {{ active_class(['data-tables']) }}">
            <a data-active="{{ is_active_route(['data-tables']) }}" href="{{ url('/data-tables') }}" aria-expanded="false" class="dropdown-toggle">
                <div class="">
                    <i class="las la-table"></i>
                    <span> {{ __('Datatables') }}</span>
                </div>
            </a>
        </li>
        <li class="menu">
            <a href="#forms" data-active="{{ is_active_route(['forms/*']) }}" data-toggle="collapse" aria-expanded="{{ is_active_route(['forms/*']) }}" class="dropdown-toggle">
                <div class="">
                    <i class="lab la-wpforms"></i>
                    <span> {{ __('Forms') }}</span>
                </div>
                <div>
                    <i class="las la-angle-right sidemenu-right-icon"></i>
                </div>
            </a>
            <ul class="collapse submenu list-unstyled {{ show_class(['forms/*']) }}" id="forms" data-parent="#accordionExample">
                <li class=" {{ active_class(['forms/controls/*']) }}">
                    <a href="#form-control" data-active="{{ is_active_route(['forms/controls/*']) }}" data-toggle="collapse" aria-expanded="{{ is_active_route(['forms/controls/*']) }}" class="dropdown-toggle"> {{ __('Controls') }} <i class="las la-angle-right sidemenu-right-icon"></i> </a>
                    <ul class="collapse list-unstyled sub-submenu {{ show_class(['forms/controls/*']) }}" id="form-control" data-parent="#pages">
                        <li>
                            <a data-active="{{ is_active_route(['forms/controls/base-inputs']) }}" href="{{ url('/forms/controls/base-inputs') }}"> {{ __('Base Input') }} </a>
                        </li>
                        <li>
                            <a data-active="{{ is_active_route(['forms/controls/input-groups']) }}" href="{{ url('/forms/controls/input-groups') }}"> {{ __('Input Groups') }} </a>
                        </li>
                        <li>
                            <a data-active="{{ is_active_route(['forms/controls/checkbox']) }}" href="{{ url('/forms/controls/checkbox') }}"> {{ __('Checkbox') }} </a>
                        </li>
                        <li>
                            <a data-active="{{ is_active_route(['forms/controls/radio']) }}" href="{{ url('/forms/controls/radio') }}"> {{ __('Radio') }} </a>
                        </li>
                        <li>
                            <a data-active="{{ is_active_route(['forms/controls/switch']) }}" href="{{ url('/forms/controls/switch') }}"> {{ __('Switch') }} </a>
                        </li>
                    </ul>
                </li>
                <li class=" {{ active_class(['forms/widgets/*']) }}">
                    <a href="#form-widget" data-active="{{ is_active_route(['forms/widgets/*']) }}" data-toggle="collapse" aria-expanded="{{ is_active_route(['forms/widgets/*']) }}" class="dropdown-toggle"> {{ __('Widgets') }} <i class="las la-angle-right sidemenu-right-icon"></i> </a>
                    <ul class="collapse list-unstyled sub-submenu {{ show_class(['forms/widgets/*']) }}" id="form-widget" data-parent="#pages">
                        <li>
                            <a data-active="{{ is_active_route(['forms/widgets/picker']) }}" href="{{ url('/forms/widgets/picker') }}"> {{ __('Picker') }} </a>
                        </li>
                        <li>
                            <a data-active="{{ is_active_route(['forms/widgets/tagify']) }}" href="{{ url('/forms/widgets/tagify') }}"> {{ __('Tagify') }} </a>
                        </li>
                        <li>
                            <a data-active="{{ is_active_route(['forms/widgets/touch-spin']) }}" href="{{ url('/forms/widgets/touch-spin') }}"> {{ __('Touch Spin') }} </a>
                        </li>
                        <li>
                            <a data-active="{{ is_active_route(['forms/widgets/maxlength']) }}" href="{{ url('/forms/widgets/maxlength') }}"> {{ __('Max Length') }} </a>
                        </li>
                        <li>
                            <a data-active="{{ is_active_route(['forms/widgets/switch']) }}" href="{{ url('/forms/widgets/switch') }}"> {{ __('Switch') }} </a>
                        </li>
                        <li>
                            <a data-active="{{ is_active_route(['forms/widgets/select-splitter']) }}" href="{{ url('/forms/widgets/select-splitter') }}"> {{ __('Select Splitter') }}</a>
                        </li>
                        <li>
                            <a data-active="{{ is_active_route(['forms/widgets/bootstrap-select']) }}" href="{{ url('/forms/widgets/bootstrap-select') }}"> {{ __('Bootstrap Select') }}
                            </a>
                        </li>
                        <li>
                            <a data-active="{{ is_active_route(['forms/widgets/select2']) }}" href="{{ url('/forms/widgets/select2') }}"> {{ __('Select 2') }} </a>
                        </li>
                        <li>
                            <a data-active="{{ is_active_route(['forms/widgets/input-masks']) }}" href="{{ url('/forms/widgets/input-masks') }}"> {{ __('Input Masks') }} </a>
                        </li>
                        <li>
                            <a data-active="{{ is_active_route(['forms/widgets/autogrow']) }}" href="{{ url('/forms/widgets/autogrow') }}"> {{ __('Autogrow') }} </a>
                        </li>
                        <li>
                            <a data-active="{{ is_active_route(['forms/widgets/range-slider']) }}" href="{{ url('/forms/widgets/range-slider') }}"> {{ __('Range Slider') }} </a>
                        </li>
                        <li>
                            <a data-active="{{ is_active_route(['forms/widgets/clipboard']) }}" href="{{ url('/forms/widgets/clipboard') }}"> {{ __('Clipboard') }} </a>
                        </li>
                        <li>
                            <a data-active="{{ is_active_route(['forms/widgets/typeahead']) }}" href="{{ url('/forms/widgets/typeahead') }}"> {{ __('Typeahead') }} </a>
                        </li>
                        <li>
                            <a data-active="{{ is_active_route(['forms/widgets/captcha']) }}" href="{{ url('/forms/widgets/captcha') }}"> {{ __('Captcha') }} </a>
                        </li>
                    </ul>
                </li>
                <li>
                    <a data-active="{{ is_active_route(['forms/validation']) }}" href="{{ url('/forms/validation') }}"> {{ __('Validations') }} </a>
                </li>
                <li>
                    <a data-active="{{ is_active_route(['forms/layouts']) }}" href="{{ url('/forms/layouts') }}">
                        {{ __('Layouts') }} </a>
                </li>
                <li>
                    <a data-active="{{ is_active_route(['forms/text-editor']) }}" href="{{ url('/forms/text-editor') }}"> {{ __('Text Editor') }} </a>
                </li>
                <li>
                    <a data-active="{{ is_active_route(['forms/file-upload']) }}" href="{{ url('/forms/file-upload') }}"> {{ __('File Upload') }} </a>
                </li>
                <li>
                    <a data-active="{{ is_active_route(['forms/multiple-step']) }}" href="{{ url('/forms/multiple-step') }}"> {{ __('Multiple Step') }} </a>
                </li>
            </ul>
        </li>
        <li class="menu">
            <a href="#maps" data-active="{{ is_active_route(['maps/*']) }}" data-toggle="collapse" aria-expanded="{{ is_active_route(['maps/*']) }}" class="dropdown-toggle">
                <div class="">
                    <i class="las la-globe-americas"></i>
                    <span> {{ __('Maps') }}</span>
                </div>
                <div>
                    <i class="las la-angle-right sidemenu-right-icon"></i>
                </div>
            </a>
            <ul class="collapse submenu list-unstyled {{ show_class(['maps/*']) }}" id="maps" data-parent="#accordionExample">
                <li class=" {{ active_class(['maps/leaflet-map']) }}">
                    <a data-active="{{ is_active_route(['maps/leaflet-map']) }}" href="{{ url('/maps/leaflet-map') }}"> {{ __('Leaflet Map') }} </a>
                </li>
                <li class=" {{ active_class(['maps/vector-map']) }}">
                    <a data-active="{{ is_active_route(['maps/vector-map']) }}" href="{{ url('/maps/vector-map') }}"> {{ __('Vector Map') }} </a>
                </li>
            </ul>
        </li>
        <li class="menu">
            <a href="#charts" data-active="{{ is_active_route(['charts/*']) }}" data-toggle="collapse" aria-expanded="{{ is_active_route(['charts/*']) }}" class="dropdown-toggle">
                <div class="">
                    <i class="las la-chart-pie"></i>
                    <span> {{ __('Charts') }}</span>
                </div>
                <div>
                    <i class="las la-angle-right sidemenu-right-icon"></i>
                </div>
            </a>
            <ul class="collapse submenu list-unstyled {{ show_class(['charts/*']) }}" id="charts" data-parent="#accordionExample">
                <li class=" {{ active_class(['charts/apex-chart']) }}">
                    <a data-active="{{ is_active_route(['charts/apex-chart']) }}" href="{{ url('/charts/apex-chart') }}"> {{ __('Apex Chart') }} </a>
                </li>
                <li class=" {{ active_class(['charts/chartlist-chart']) }}">
                    <a data-active="{{ is_active_route(['charts/chartlist-chart']) }}" href="{{ url('/charts/chartlist-chart') }}"> {{ __('Chartlist Charts') }} </a>
                </li>
                <li class=" {{ active_class(['charts/chartjs']) }}">
                    <a data-active="{{ is_active_route(['charts/chartjs']) }}" href="{{ url('/charts/chartjs') }}"> {{ __('ChartJS') }} </a>
                </li>
                <li class=" {{ active_class(['charts/morris-chart']) }}">
                    <a data-active="{{ is_active_route(['charts/morris-chart']) }}" href="{{ url('/charts/morris-chart') }}"> {{ __('Morris Charts') }} </a>
                </li>
            </ul>
        </li>
        <li class="menu">
            <a href="#starter-kit" data-active="{{ is_active_route(['starter/*']) }}" data-toggle="collapse" aria-expanded="{{ is_active_route(['starter/*']) }}" class="dropdown-toggle">
                <div class="">
                    <i class="las la-copy"></i>
                    <span> {{ __('Starter Kit') }}</span>
                </div>
                <div>
                    <i class="las la-angle-right sidemenu-right-icon"></i>
                </div>
            </a>
            <ul class="collapse submenu list-unstyled {{ show_class(['starter/*']) }}" id="starter-kit" data-parent="#accordionExample">
                <li class=" {{ active_class(['starter/blank-page']) }}">
                    <a data-active="{{ is_active_route(['starter/blank-page']) }}" href="{{ url('/starter/blank-page') }}"> {{ __('Blank Page') }} </a>
                </li>
                <li class=" {{ active_class(['starter/breadcrumbs']) }}">
                    <a data-active="{{ is_active_route(['starter/breadcrumbs']) }}" href="{{ url('/starter/breadcrumbs') }}"> {{ __('Breadcrumbs') }} </a>
                </li>
            </ul>
        </li>
        <li class="menu">
            <a href="#multi-level" data-toggle="collapse" aria-expanded="false" class="dropdown-toggle">
                <div class="">
                    <i class="las la-sitemap"></i>
                    <span> {{ __('Multi Level') }}</span>
                </div>
                <div>
                    <i class="las la-angle-right sidemenu-right-icon"></i>
                </div>
            </a>
            <ul class="collapse submenu list-unstyled" id="multi-level" data-parent="#accordionExample">
                <li>
                    <a href="#level-two" data-toggle="collapse" aria-expanded="false" class="dropdown-toggle">
                        {{ __('Level 2') }} <i class="las la-angle-right sidemenu-right-icon"></i> </a>
                    <ul class="collapse list-unstyled sub-submenu" id="level-two" data-parent="#pages">
                        <li>
                            <a href="javascript:void(0)"> {{ __('Link 1') }} </a>
                        </li>
                        <li>
                            <a href="javascript:void(0)"> {{ __('Link 2') }} </a>
                        </li>
                    </ul>
                </li>
                <li>
                    <a href="#level-three" data-toggle="collapse" aria-expanded="false" class="dropdown-toggle">
                        {{ __('Level 3') }} <i class="las la-angle-right sidemenu-right-icon"></i> </a>
                    <ul class="collapse list-unstyled sub-submenu" id="level-three" data-parent="#pages">
                        <li>
                            <a href="javascript:void(0)"> {{ __('Link 1') }}</a>
                        </li>
                        <li>
                            <a href="#level-four" data-toggle="collapse" aria-expanded="false" class="dropdown-toggle"> {{ __('Link 2') }} <i class="las la-angle-right sidemenu-right-icon"></i> </a>
                            <ul class="collapse list-unstyled sub-sub-submenu" id="level-four" data-parent="#pages">
                                <li>
                                    <a href="javascript:void(0)"> {{ __('Link 1') }}</a>
                                </li>
                                <li>
                                    <a href="javascript:void(0)"> {{ __('Link 2') }} </a>
                                </li>
                            </ul>
                        </li>
                    </ul>
                </li>
            </ul>
        </li>
        <li class="menu-title"></li>
        <li class="menu">
            <a href="http://neptuneweb.xyz" aria-expanded="false" class="dropdown-toggle">
                <div class="">
                    <i class="las la-file-code"></i>
                    <span> {{ __('Documentation') }}</span>
                </div>
            </a>
        </li> --}}
    </ul>
    <!-- <ul class="sidebar-bottom-options">
<li class="nav-item dropdown message-dropdown">
<a href="javascript:void(0);" class="nav-link dropdown-toggle" id="messageDropdown" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
<i class="las la-envelope"></i>
</a>
<div class="dropdown-menu position-absolute" aria-labelledby="messageDropdown">
<div class="nav-drop is-notification-dropdown">
<div class="inner">
<div class="nav-drop-header mb-2 px-2">
<span class="text-black font-12 strong">{{ __('3 new mails') }}</span>
<a class="text-muted font-12" href="#">
{{ __('Mark all read') }}
</a>
</div>
<div class="nav-drop-body account-items pb-0">
<a class="account-item">
<div class="media">
<div class="user-img">
<img class="rounded-circle avatar-xs" src="{{ asset('assets/img/profile-11.jpg') }}" alt="profile">
</div>
<div class="media-body">
<div class="">
<h6 class="text-primary font-13 mb-0 strong">Jennifer Queen</h6>
<p class="m-0 mt-1 font-10 text-muted">{{ __('Permission Required') }}
</p>
</div>
</div>
</div>
</a>
<a class="account-item marked-read">
<div class="media">
<div class="user-img">
<img class="rounded-circle avatar-xs" src="{{ url('assets/img/profile-10.jpg') }}" alt="profile">
</div>
<div class="media-body">
<div class="">
<h6 class="text-primary font-13 mb-0 strong">Lara Smith</h6>
<p class="m-0 mt-1 font-10 text-muted">{{ 'Invoice needed' }}</p>
</div>
</div>
</div>
</a>
<a class="account-item marked-read">
<div class="media">
<div class="user-img">
<img class="rounded-circle avatar-xs" src="{{ url('assets/img/profile-9.jpg') }}" alt="profile">
</div>
<div class="media-body">
<div class="">
<h6 class="text-primary font-13 mb-0 strong">Victoria Williamson</h6>
<p class="m-0 mt-1 font-10 text-muted">
{{ __('Account need to be synced') }}
</p>
</div>
</div>
</div>
</a>
<div class="text-center">
<a class="text-primary strong font-13" href="{{ url('/apps/email/inbox') }}">{{ __('View All') }}</a>
</div>
</div>
</div>
</div>
</div>
</li>
<li class="nav-item dropdown notification-dropdown">
<a href="javascript:void(0);" class="nav-link dropdown-toggle" id="notificationDropdown" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
<i class="las la-bell"></i>
<div class="notification-circle">4</div>
</a>
<div class="dropdown-menu position-absolute" aria-labelledby="notificationDropdown">
<div class="nav-drop is-notification-dropdown">
<div class="inner">
<div class="nav-drop-header mb-2 px-2">
<span class="text-black font-12 strong">{{ __('4 Notifications') }}</span>
<a class="text-muted font-12" href="#">
{{ __('Clear All') }}
</a>
</div>
<div class="nav-drop-body account-items pb-0">
<a class="account-item" href="{{ url('/apps/ecommerce/orders') }}">
<div class="media align-center">
<div class="icon-wrap">
<i class="las la-box font-20"></i>
</div>
<div class="media-content ml-3">
<h6 class="font-13 mb-0 strong">{{ __('2 New orders placed') }}</h6>
<p class="m-0 mt-1 font-10 text-muted"> {{ __('10 sec ago') }}</p>
</div>
</div>
</a>
<a class="account-item" href="javascript:void(0)">
<div class="media align-center">
<div class="icon-wrap">
<i class="las la-user-plus font-20"></i>
</div>
<div class="media-content ml-3">
<h6 class="font-13 mb-0 strong"> {{ __('New User registered') }}</h6>
<p class="m-0 mt-1 font-10 text-muted"> {{ __('5 minute ago') }}</p>
</div>
</div>
</a>
<a class="account-item" href="{{ url('/apps/tickets/list') }}">
<div class="media align-center">
<div class="icon-wrap">
<i class="las la-grin-beam font-20"></i>
</div>
<div class="media-content ml-3">
<h6 class="font-13 mb-0 strong">{{ __('21 Queries solved') }}</h6>
<p class="m-0 mt-1 font-10 text-muted"> {{ __('1 hour ago') }}</p>
</div>
</div>
</a>
<div class="text-center p-2 mt-2">
<a class="text-primary strong font-13" href="{{ url('/pages/notifications') }}">
{{ __('View All') }}</a>
</div>
</div>
</div>
</div>
</div>
</li>
<li class="nav-item dropdown user-profile-dropdown">
<a href="javascript:void(0);" class="nav-link dropdown-toggle user" id="userProfileDropdown" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
<img src="{{ url('assets/img/profile-1.jpg') }}" alt="avatar">
</a>
<div class="dropdown-menu position-absolute" aria-labelledby="userProfileDropdown">
<div class="nav-drop is-account-dropdown">
<div class="inner">
<div class="nav-drop-body account-items pb-0">
<a id="profile-link" class="account-item" href="{{ url('/pages/profile') }}">
<div class="media align-center">
<div class="media-left">
<div class="image">
<img class="rounded-circle avatar-xs" src="{{ url('assets/img/profile-1.jpg') }}" alt="">
</div>
</div>
<div class="media-content ml-3">
<h6 class="font-13 mb-0 strong">John Doe</h6>
<small>john@neptune.com</small>
</div>
<div class="media-right">
<i data-feather="check"></i>
</div>
</div>
</a>
<a class="account-item" href="{{ url('/pages/profile') }}">
<div class="media align-center">
<div class="icon-wrap">
<i class="las la-user font-20"></i>
</div>
<div class="media-content ml-3">
<h6 class="font-13 mb-0 strong"> {{ __('My Account') }}</h6>
</div>
</div>
</a>
<a class="account-item" href="{{ url('/pages/timeline') }}">
<div class="media align-center">
<div class="icon-wrap">
<i class="las la-briefcase font-20"></i>
</div>
<div class="media-content ml-3">
<h6 class="font-13 mb-0 strong">{{ __('My Activity') }}</h6>
</div>
</div>
</a>
<a class="account-item" href="{{ url('/authentications/style3/locked') }}">
<div class="media align-center">
<div class="icon-wrap">
<i class="las la-lock font-20"></i>
</div>
<div class="media-content ml-3">
<h6 class="font-13 mb-0 strong">{{ __('Lock Screen') }}</h6>
</div>
</div>
</a>
<a class="account-item" href="{{ url('/authentications/style3/login') }}">
<div class="media align-center">
<div class="icon-wrap">
<i class="las la-sign-out-alt font-20"></i>
</div>
<div class="media-content ml-3">
<h6 class="font-13 mb-0 strong ">{{ __('Logout') }}</h6>
</div>
</div>
</a>
</div>
</div>
</div>
</div>
</li>
</ul> -->
</nav>
