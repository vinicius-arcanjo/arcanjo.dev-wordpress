        {{-- menu bar --}}
        <div class="ark-menu-bar">

            {{-- menu bar frame --}}
            <div class="ark-menu-bar-frame">

                {{-- menu bar header --}}
                <div class="ark-menu-bar-header">
                    {{-- menu bar button --}}
                    <a class="ark-menu-bar-btn" href="#.">
                        {{-- icon --}}
                        <span></span>
                    </a>
                    {{-- menu bar button end --}}
                </div>
                {{-- menu bar header end --}}

                {{-- current page title --}}
                <div class="ark-current-page"><a href="{{ get_the_permalink() }}">{{ the_title() }}</a></div>
                {{-- current page title end --}}

                {{-- scroll frame --}}
                <div class="ark-scroll-frame">

                    {{-- menu --}}
                    <nav id="swupMenu">
                        {{-- menu list --}}
                        <ul class="main-menu">
                            {{-- menu item --}}
                            <li class="menu-item current-menu-item"><a href="/">Home</a></li>
                            {{-- menu item --}}
                            <li class="menu-item menu-item-has-children">
                                <a href="#">Cursos</a>
                                {{-- sub menu --}}
                                <ul class="sub-menu">
                                    {{-- lvl 2 nav link --}}
                                    <li class="menu-item"><a href="/">WordPress Avançado</a></li>
                                    {{-- lvl 2 nav link end --}}
                                </ul>
                                {{-- sub menu end --}}
                            </li>
                            {{-- menu item --}}
                            <li class="menu-item {{-- menu-item-has-children --}}">
                                <a href="/projetos">Portfólio</a>
                            </li>
                            {{-- menu item --}}
                            <li class="menu-item"><a href="/historia">Historia</a></li>
                            {{-- menu item --}}
                            <li class="menu-item"><a href="/blog">Blog</a></li>
                            {{-- menu item --}}
                            <li class="menu-item"><a href="../contato">Contato</a></li>
                        </ul>
                        {{-- menu list end --}}
                    </nav>
                    {{-- menu end --}}

                    <div class="ark-dark-mode">
                        <div>
                            <span class="ark-mode">Mode</span>
                            <span class="ark-line"></span>
                        </div>
                        <input checked type="checkbox" id="ark-toggle" />
                        <label class="m-0" for="ark-toggle"></label>
                    </div>

                    {{-- language change --}}
                    <ul class="ark-language-change">
                        {{-- language item --}}
                        <li><a href="#.">EN</a></li>
                        {{-- language item --}}
                        <li class="ark-active-lang"><a href="https://arcanjo.dev">PT</a></li>
                    </ul>
                    {{-- language change end --}}

                </div>
                {{-- scroll frame end --}}

            </div>
            {{-- menu bar frame --}}

        </div>
