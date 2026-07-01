<aside class="main-sidebar sidebar-dark-primary elevation-4">

    <!-- Brand -->

    <a href="{{ url('/') }}" class="brand-link text-center">

        <span class="brand-text font-weight-bold">

            🧬 LABKU

        </span>

        <br>

        <small class="text-light">

            Laboratory Information System

        </small>

    </a>

    <!-- Sidebar -->

    <div class="sidebar">

        <nav class="mt-2">

            <ul class="nav nav-pills nav-sidebar flex-column"
                data-widget="treeview"
                role="menu"
                data-accordion="false">

                {{-- Dashboard --}}

                <li class="nav-item">

                    <a href="/"
                       class="nav-link {{ request()->is('/') ? 'active' : '' }}">

                        <i class="nav-icon fas fa-home"></i>

                        <p>

                            Dashboard

                        </p>

                    </a>

                </li>

                {{-- MASTER --}}

                <li class="nav-header">

                    MASTER

                </li>

                <li class="nav-item">

                    <a href="/patients" class="nav-link">

                        <i class="nav-icon fas fa-user"></i>

                        <p>Patient</p>

                    </a>

                </li>

                <li class="nav-item">

                    <a href="/doctors" class="nav-link">

                        <i class="nav-icon fas fa-user-md"></i>

                        <p>Doctor</p>

                    </a>

                </li>

                <li class="nav-item">

                    <a href="/analyzers" class="nav-link">

                        <i class="nav-icon fas fa-microscope"></i>

                        <p>Analyzer</p>

                    </a>

                </li>

                <li class="nav-item">

                    <a href="/methods" class="nav-link">

                        <i class="nav-icon fas fa-flask"></i>

                        <p>Method</p>

                    </a>

                </li>

                <li class="nav-item">

                    <a href="/units" class="nav-link">

                        <i class="nav-icon fas fa-weight-hanging"></i>

                        <p>Unit</p>

                    </a>

                </li>
                <li class="nav-item">

                    <a href="/sample-types" class="nav-link">

                        <i class="nav-icon fas fa-vial"></i>

                        <p>Sample Type</p>

                    </a>

                </li>


                <li class="nav-item">

                    <a href="/test-groups" class="nav-link">

                        <i class="nav-icon fas fa-layer-group"></i>

                        <p>Test Group</p>

                    </a>

                </li>

                <li class="nav-item">

                    <a href="/print-groups" class="nav-link">

                        <i class="nav-icon fas fa-print"></i>

                        <p>Print Group</p>

                    </a>

                </li>

                <li class="nav-item">

                    <a href="/test-parameters" class="nav-link">

                        <i class="nav-icon fas fa-dna"></i>

                        <p>Test Parameter</p>

                    </a>

                </li>

                <li class="nav-item">
    <a href="{{ route('references.index') }}"
       class="nav-link {{ request()->routeIs('references.*') || request()->routeIs('reference.*') ? 'active' : '' }}">

        <i class="nav-icon fas fa-book-medical"></i>

        <p>

            Reference

        </p>

    </a>
</li>

                {{-- TRANSACTION --}}

                <li class="nav-header">

                    TRANSACTION

                </li>

                <li class="nav-item">

                    <a href="/registrations" class="nav-link">

                        <i class="nav-icon fas fa-file-medical"></i>

                        <p>Registration</p>

                    </a>

                </li>

                <li class="nav-item">

                    <a href="/sample-collections" class="nav-link">

                        <i class="nav-icon fas fa-syringe"></i>

                        <p>Sample Collection</p>

                    </a>

                </li>

                {{-- REPORT --}}

                <li class="nav-header">

                    REPORT

                </li>

                <li class="nav-item">

                    <a href="#"
                       class="nav-link">

                        <i class="nav-icon fas fa-chart-line"></i>

                        <p>

                            Coming Soon

                        </p>

                    </a>

                </li>

                {{-- SETTING --}}

                <li class="nav-header">

                    SETTING

                </li>

                <li class="nav-item">

                    <a href="/lab-setting"
                       class="nav-link">

                        <i class="nav-icon fas fa-cogs"></i>

                        <p>

                            Lab Setting

                        </p>

                    </a>

                </li>

            </ul>

        </nav>

    </div>

</aside>