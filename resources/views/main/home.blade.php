@include('layouts.mainsite.header');
          <div class="sd-header__hero row">
                    <div class="col-sm-10 col-md-7 col-lg-5 sd-header__content pe-xl-8">
                        <div>
                            <h1 class="title title--light position-relative mb-6">Unlock the <span
                                    class="title__bg title__bg--purple">Power</span> Resilience<br
                                    class="d-none d-md-block" />Renewable<span
                                    class="title__bg title__bg--violet"></span></h1>
                            <p class="s18 mb-4">we create enduring wealth and
                                    lifelong value for our stakeholders by delivering innovative, scalable, and
                                    sustainable energy solutions that power the future.
                                    We envision a world driven by clean, resilient energy systems.</p>
                            <div class="button__overlay"><a href="{{ route('register') }}"
                                    class="button button--primary ">
                                    <div class="round"></div><span>Create Account</span>
                                </a></div>
                        </div>
                    </div>
                    <div class="col-sm-2 col-md-5 col-lg-7 d-flex">
                        <div class="position-relative">
                            <div class="sd-header__box" data-aos="animation-scale-x-right"><img
                                    srcset='{{ asset('') }}assets/app/images/header-box-img@2x.png 2x' src='app/images/header-box-img.png'>
                                <p class="mb-0 white s23 col-10 medium">A Vision Committed To Ensuring Your Success.
                                </p>
                            </div>x
                        </div>
                        <div class="sd-header__img"><img src="{{ asset('') }}assets/app/images/firef.png" style="height: 1160px;"></div>
                    </div>
                </div>
            </div>
        </header>      
        <div class="sd-section sd-about" id="sd-about">
            <div class="container">
                <div class="row d-flex gy-3 align-items-stretch">
                    <div class=" col-lg-6  col-xl-6">
                        <div class="sd-about__left"><a href="{{ route('register') }}" class="button-rounded"><img
                                    src="{{ asset('') }}assets/app/images/svg/button-rounded-circle.svg" alt="">
                                <div><svg class='svg-icon size-24'>
                                        <use xlink:href='app/images/svg/sprite.svg#arrow-right-up'></use>
                                    </svg><span>Join Us</span></div>
                            </a>
                            <div class="position-relative col-lg-10 col-xl-9">
                                <h5 class="title mb-3"><img src="{{ asset('') }}assets/app/images/svg/h5-header-svg.svg" alt=""><span>About
                                        Resilience Renewable Energy Services</span></h5>
                                <h2 class="title mb-6">Leading Innovation in Renewable energy sector</h2>
                                <p class="s18 dark ">Welcome to Resilience renewable energy services, a pioneer
                                in the renewable energy sector dedicated to transforming the
                                way we power our lives.
                                Specializing in Solar, wind, hydro, biogas, methane, and biofuel
                                solutions, our company is committed to providing sustainable
                                and innovative energy alternatives.</p>
                            </div>
                        </div>
                    </div>
                    <div class=" col-lg-6 col-xl-6">
                        <div class="sd-about__right">
                            <div class="sd-about__stat stat mb-8">
                                <div class="row g-2">
                                    <div class="col-sm-6 col-md-6 col-lg-6 col-xl-7">
                                        <div class="stat__box stat__box--1">
                                            <div class="mb-auto d-flex justify-content-end"><img
                                                    src="{{ asset('') }}assets/app/images/about-stat-icon-1.png" class="mt-n2"></div>
                                            <div>
                                                <div class="stat__label"><span>Total Registered</span></div>
                                                <div class="stat__value">13</div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-sm-6 col-md-6 col-lg-6 col-xl-5">
                                        <div class="stat__box stat__box--2">
                                            <div class="mb-auto">
                                                <div class="stat__icon"><svg class='svg-icon size-36 green '>
                                                        <use xlink:href='app/images/svg/sprite.svg#stat-icon-invest'>
                                                        </use>
                                                    </svg></div>
                                            </div>
                                            <div>
                                                <div class="stat__label"><span>Users Online</span> <i></i></div>
                                                <div class="stat__value">1</div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-xl-10">
                                <p class="s25 white mb-4 medium">With a focus on excellence and sustainability, we strive to
                                        contribute significantly to the global energy transition while
                                        ensuring the prosperity of our stakeholders.</p>
                                <p class="s18 mb-4 ">Our team of experts works tirelessly to develop cutting-edge
                                            technologies and solutions that meet the growing demand for
                                            clean energy.</p>
                                <div class="button__overlay"><a href="{{ route('register') }}"
                                        class="button button--primary ">
                                        <div class="round"></div><span>Join Company</span>
                                    </a></div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="sd-section sd-advantages">
            <div class="container">
                <div class="text-center">
                    <h5 class="title  title--light mb-3"><img src="{{ asset('') }}assets/app/images/svg/h5-header-svg-v1.svg" alt=""><span>Our
                            Advantages</span></h5>
                    <h2 class="title title--light mb-6">Why Resilience Entered In The
                    Market<br
                            class="d-none d-md-block" />Resilience identified a critical global need</h2>
                </div>
                <div class="sd-advantages__list">
                    <div class="row d-flex align-items-stretch gy-3 ">
                        <div class="col-12 col-xl-4">
                            <div class="sd-advantages__box sd-advantages__box--1" data-aos="flip-left"><img
                                    src="{{ asset('') }}assets/app/images/box-adv-bg-img-1.png" class="sd-advantages__bg">
                                <h3 class="title title-gradient-1 mb-5">Solar energy systems</h3>
                                <p class="mb-5"> Solar energy systems for residential, commercial, and utilityscale applications.</p><img src="{{ asset('') }}assets/app/images/svg/adv-img-1.svg"
                                    class="sd-advantages__img"><a href="index%EF%B9%96a=signup.html"
                                    class="button button--secondary me-auto  mt-auto">
                                    <div class="round"></div><span class="me-2">Look More</span><svg
                                        class='svg-icon size-small '>
                                        <use xlink:href='app/images/svg/sprite.svg#arrow-right'></use>
                                    </svg>
                                </a>
                            </div>
                        </div>
                        <div class="col-12 col-xl-8">
                            <div class="row h-100 d-flex align-items-stretch gy-3">
                                <div class="col-md-5">
                                    <div class="sd-advantages__box sd-advantages__box--2" data-aos="flip-up"
                                        data-aos-delay="150"><img src="{{ asset('') }}assets/app/images/box-adv-img-1.png"
                                            class="sd-advantages__img me-auto mb-3 mt-n1 mt-sm-n4">
                                        <h3 class="title title-gradient-2 mb-3">Wind power projects</h3>
                                        <p class="mb-n2">Wind power projects are designed for both onshore and
                                            distributed energy networks.
                                            </p>
                                    </div>
                                </div>
                                <div class="col-md-7">
                                    <div class="sd-advantages__box sd-advantages__box--3" data-aos="flip-right"
                                        data-aos-delay="300"><img src="{{ asset('') }}assets/app/images/box-adv-bg-img-3.png"
                                            class="sd-advantages__bg">
                                        <h3 class="title title-gradient-1 mb-5">Hydro and<br />micro-hydro solutions</h3>
                                        <div class="pe-sm-4">
                                            <div class="d-flex align-items-start mb-4"><img
                                                    srcset='{{ asset('') }}assets/app/images/checkbox@2x.png 2x' class="me-3"
                                                    src='app/images/checkbox.png'>
                                                <p>Hydro and micro-hydro solutions enabling reliable power
                                                    generation in diverse geographies.</p>
                                            </div>
                                            <div class="d-flex align-items-start"><img
                                                    srcset='app/images/checkbox@2x.png 2x' class="me-3"
                                                    src='{{ asset('') }}assets/app/images/checkbox.png'>
                                                <p>Biogas and methane recovery systems that convert waste into
                                                    clean, usable energy.
                                                </p>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-7 col-xl-auto">
                            <div class="sd-advantages__box sd-advantages__box--4" data-aos="flip-down"
                                data-aos-delay="150">
                                <div class="col-sm-6">
                                    <h3 class="title title-gradient-3 mb-5">Biofuel production</h3>
                                    <p class="mb-5 col--sm-10">Biofuel production and distribution <b style="color:#fff;"> supporting</b> sustainable fuel
                                        alternatives</p>
                                </div>
                                <div class="sd-advantages__info"><img src="{{ asset('') }}assets/app/images/svg/ref-percentage-bg.svg" alt="">
                                    <div><b>$1.5 trillion</b><span> in 2024</span></div>
                                    <div><b>$7.3 trillion</b><span> by 2034</span></div>
                                    <div><b>$7.4 trillion</b><span> by 2034</span></div>
                                </div><a href="" target="_blank" class="button button--secondary me-auto  mt-auto">
                                    <div class="round"></div><span class="me-2">Look More</span><svg
                                        class='svg-icon size-small '>
                                        <use xlink:href='app/images/svg/sprite.svg#arrow-right'></use>
                                    </svg>
                                </a>
                            </div>
                        </div>
                        <div class="col-lg-5 col-xl-auto">
                            <div class="sd-advantages__box sd-advantages__box--5" data-aos="flip-down"
                                data-aos-delay="300">
                                <div class="col-xl-8">
                                    <h3 class="title title-gradient-4 mb-5">Multiple Payment Methods</h3>
                                    <p class="mb-7">Accepts a wide range of payment options for seamless transactions:
                                    </p>
                                    <div class="sd-advantages__payment  ">
                                        <div class="row gy-1">
                                            <div class="col-12"><img src="{{ asset('') }}assets/app/images/svg/payment-icons-line-1.svg"
                                                    class="line-1"></div>
                                            <div class="col-12 "><img src="{{ asset('') }}assets/app/images/svg/payment-icons-line-2.svg"
                                                    class="line-2"></div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="sd-section sd-plans" id="sd-plans">
            <div class="container">
                <h5 class="title  title--light title--right mb-3"><span>Our Investment</span><img
                        src="{{ asset('') }}assets/app/images/svg/h5-header-svg-v2.svg"></h5>
                <h2 class="title title--light mb-6">Investment Plans<br /> Overview</h2>
                <div class="row d-flex  gy-6 gy-md-4 align-items-stretch ">
                    <div class="col-md-6">
                        <div class="sd-plans__left">
                            <div class="sd-plans__item sd-plans__item--1 sd-plans__item--active"
                                data-aos="animation-scale-x-left">
                                <div class="sd-plans__overlay">
                                    <div class="round"></div><svg class='svg-icon sd-plans__icon size-36 mb-4'>
                                        <use xlink:href='app/images/svg/sprite.svg#box'></use>
                                    </svg>
                                    <div class="sd-plans__name mb-4"><span>LEADERSHIP RANK BONUS</span></div>
                                    <p class="mb-5">Promote more and earn more</p>
                                    <div class="sd-plans__percent"><b>5%</b> <span>Team Business</span></div>
                                    <div class="sd-plans__devider mt-6 mb-6"></div>
                                    <div class="sd-plans__list mb-8">
                                        <div><span><svg class='svg-icon '>
                                                    <use xlink:href='app/images/svg/sprite.svg#load'></use>
                                                </svg>Period of time</span><b>10 Months</b></div>
                                        <div><span><svg class='svg-icon '>
                                                    <use xlink:href='app/images/svg/sprite.svg#load'></use>
                                                </svg>Direct Business</span><b>$ 2000 </b></div>
                                        <div><span><svg class='svg-icon '>
                                                    <use xlink:href='app/images/svg/sprite.svg#load'></use>
                                                </svg>Self ID </span><b>$500 </b></div>
                                        <div><span><svg class='svg-icon '>
                                                    <use xlink:href='app/images/svg/sprite.svg#load'></use>
                                                </svg>Total Reward</span><b>$500 </b></div>
                                        <div><span><svg class='svg-icon '>
                                                    <use xlink:href='app/images/svg/sprite.svg#load'></use>
                                                </svg>Duration</span><b>10 Months</b></div>
                                        <div><span><svg class='svg-icon '>
                                                    <use xlink:href='app/images/svg/sprite.svg#load'></use>
                                                </svg>Travel Reward</span><b>Yes</b></div>
                                    </div>
                                </div><a class="sd-plans__button" href="index%EF%B9%96a=signup.html">
                                    <div><svg class='svg-icon  size-36'>
                                            <use xlink:href='app/images/svg/sprite.svg#arrow-plan'></use>
                                        </svg></div>
                                </a>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="sd-plans__right">
                            <div class="sd-plans__item sd-plans__item--2 sd-plans__item--premium"
                                data-aos="animation-scale-x-right">
                                <div class="sd-plans__overlay">
                                    <div class="round"></div><svg class='svg-icon sd-plans__icon size-36 mb-4'>
                                        <use xlink:href='app/images/svg/sprite.svg#box-premium'></use>
                                    </svg>
                                    <div class="sd-plans__name mb-4"><span>Rewards</span></div>
                                    <p class="mb-5">Designed for seasoned investors looking for higher stakes and
                                        returns.</p>
                                    <div class="sd-plans__percent"><b>2BHK </b> <span> Flat Fund</span></div>
                                    <div class="sd-plans__devider mt-6 mb-6"></div>
                                    <div class="sd-plans__list mb-8">
                                        <div><span><svg class='svg-icon '>
                                                    <use xlink:href='app/images/svg/sprite.svg#load'></use>
                                                </svg>Period of time</span><b>On time</b></div>
                                        <div><span><svg class='svg-icon '>
                                                    <use xlink:href='app/images/svg/sprite.svg#load'></use>
                                                </svg>Direct Business</span><b>$ 7,500</b></div>
                                        <div><span><svg class='svg-icon '>
                                                    <use xlink:href='app/images/svg/sprite.svg#load'></use>
                                                </svg>Team Business</span><b>$25,00,000 </b></div>
                                        <div><span><svg class='svg-icon '>
                                                    <use xlink:href='app/images/svg/sprite.svg#load'></use>
                                                </svg>Total Team</span><b>10000 </b></div>
                                        <div><span><svg class='svg-icon '>
                                                    <use xlink:href='app/images/svg/sprite.svg#load'></use>
                                                </svg>Self ID</span><b> $25,000</b></div>
                                        <div><span><svg class='svg-icon '>
                                                    <use xlink:href='app/images/svg/sprite.svg#load'></use>
                                                </svg>Total Reward</span><b>$100000</b></div>
                                    </div>
                                </div><a class="sd-plans__button sd-plans__button--premium"
                                    href="index%EF%B9%96a=signup.html">
                                    <div><svg class='svg-icon  size-36'>
                                            <use xlink:href='app/images/svg/sprite.svg#arrow-plan'></use>
                                        </svg></div>
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="sd-advantages__box sd-advantages__box--1 pt-8  w-100">
                    <div class="position-relative">
                        <div class="text-center">
                            <h3 class="title title-gradient-3 d-inline-flex mb-5">Calculate profit</h3>
                        </div>
                        <div class="row d-flex justify-content-center gy-4 gx-6">
                            <div class="col-xl-10">
                                <div class="form-group form-group__dark mb-0"><label><i class="form-icon"><svg
                                                class="svg-icon size-16">
                                                <use xlink:href="{{ asset('') }}assets/app/images/svg/sprite.svg?1723350189#deposit1-stroke">
                                                </use>
                                            </svg></i><span>Enter Deposit Amount</span></label><input value="20"
                                        type="text" class="form-control calc__amount" name="amount"
                                        style="border-radius: 4px 4px 0 0; font-size:23px; height: 64px; text-align: center;"
                                        onclick="this.select();"></div>
                                <div class="mt-n2 position-relative"><input type="range" class="form-range calc__range"
                                        min="20" step="1" max="10000" value="20"></div>
                            </div>
                            <div class="col-xl-10">
                                <div class="sd-advantages__box sd-advantages__box--3 p-4 p-sm-5 h-auto">
                                    <div class="row gy-4 gx-8">
                                        <div class="col-lg-6">
                                            <div class="d-flex align-items-center justify-content-between">
                                                <div>
                                                    <p class="mb-1">Daily Profit</p>
                                                    <p class="s25 white medium"><span>$</span><abbr
                                                            class="dailyProfit">2.00</abbr></p>
                                                </div><svg xmlns="http://www.w3.org/2000/svg" data-name="Layer 1"
                                                    viewBox="0 0 32 32" width="46" height="46">
                                                    <path fill="#42364e"
                                                        d="M10 25.43a1 1 0 0 1-.34-.06 9.92 9.92 0 0 1 0-18.74 1 1 0 1 1 .68 1.88 7.92 7.92 0 0 0 0 15 1 1 0 0 1-.34 1.92Z">
                                                    </path>
                                                    <path fill="#bcd247"
                                                        d="M18.9 6A10 10 0 1 0 29 16 10.06 10.06 0 0 0 18.9 6Zm0 18a8 8 0 1 1 8.1-8 8.06 8.06 0 0 1-8.1 8Z">
                                                    </path>
                                                    <path fill="#78872a"
                                                        d="M22 17.5a2.5 2.5 0 0 1-2 2.5v1a1 1 0 0 1-2 0v-1h-1a1 1 0 0 1 0-2h2.5a.5.5 0 0 0 0-1h-1a2.5 2.5 0 0 1-.5-4.95V11a1 1 0 0 1 2 0v1h1a1 1 0 0 1 0 2h-2.5a.5.5 0 0 0 0 1h1a2.5 2.5 0 0 1 2.5 2.5Z">
                                                    </path>
                                                </svg>
                                            </div>
                                        </div>
                                        <div class="col-lg-6">
                                            <div class="d-flex align-items-center justify-content-between">
                                                <div>
                                                    <p class="mb-1">Total Return</p>
                                                    <p class="s25 white medium"><span>$</span><abbr
                                                            class="totalReturn">24.00</abbr></p>
                                                </div><svg xmlns="http://www.w3.org/2000/svg" data-name="Layer 1"
                                                    viewBox="0 0 32 32" width="46" height="46">
                                                    <path fill="#42364e"
                                                        d="M10 25.43a1 1 0 0 1-.34-.06 9.92 9.92 0 0 1 0-18.74 1 1 0 1 1 .68 1.88 7.92 7.92 0 0 0 0 15 1 1 0 0 1-.34 1.92Z">
                                                    </path>
                                                    <path fill="#904df6"
                                                        d="M18.9 6A10 10 0 1 0 29 16 10.06 10.06 0 0 0 18.9 6Zm0 18a8 8 0 1 1 8.1-8 8.06 8.06 0 0 1-8.1 8Z">
                                                    </path>
                                                    <path fill="#904df6"
                                                        d="M22 17.5a2.5 2.5 0 0 1-2 2.5v1a1 1 0 0 1-2 0v-1h-1a1 1 0 0 1 0-2h2.5a.5.5 0 0 0 0-1h-1a2.5 2.5 0 0 1-.5-4.95V11a1 1 0 0 1 2 0v1h1a1 1 0 0 1 0 2h-2.5a.5.5 0 0 0 0 1h1a2.5 2.5 0 0 1 2.5 2.5Z">
                                                    </path>
                                                </svg>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="sd-section sd-affiliate" id="sd-affiliate">
            <div class="container">
                <div class="row d-flex gx-2 gy-3 align-items-stretch">
                    <div class="col-lg-7">
                        <div class="sd-affiliate__left">
                            <div class="w-100 ps-sm-7 pe-sm-7 pe-xl-0">
                                <div class="sd-affiliate__box sd-affiliate__box--1 col-xl-8 mb-4" data-aos="flip-left"
                                    data-aos-delay="0"><img src="{{ asset('') }}assets/app/images/svg/icon-percent.svg" alt="">
                                    <h4 class="title title-gradient-1">Accelerate Your Growth.<br /> Multiply Your Earnings</h4>
                                </div>
                                <div class="sd-affiliate__box sd-affiliate__box--2 mb-4 col-xl-8 offset-xl-3"
                                    data-aos="flip-right" data-aos-delay="150"><img src="{{ asset('') }}assets/app/images/svg/adv-img-2.svg"
                                        alt="">
                                    <div>
                                        <h4 class="title title-gradient-2 mb-3">Booster Bonus</h4>
                                        <p class="mb-2">The Booster Bonus is designed to reward fast action and strong leadership by offering enhanced</p>
                                        <p>earning potential when you build your team quickly and strategically.</p>
                                    </div>
                                </div>
                                <div class="sd-affiliate__box sd-affiliate__box--3 col-xl-8  offsetx-xl-1"
                                    data-aos="flip-left" data-aos-delay="300"><img
                                        srcset='app/images/affiliate-box-img-3@2x.png 2x'
                                        src='{{ asset('') }}assets/app/images/affiliate-box-img-3.png'>
                                    <div class="col-9">
                                        <h4 class="title title-gradient-5 mb-3">How It Works</h4>
                                        <p class="mb-4">Refer 3 direct members within the same or higher package within 48 hours & Earn up to 20% Booster
                                         Bonus</p><a href="index%EF%B9%96a=signup.html"
                                            class="button button--outline me-auto  mt-auto">
                                            <div class="round"></div><span class="me-2">Look More</span><svg
                                                class="svg-icon size-small ">
                                                <use xlink:href="{{ asset('') }}assets/app/images/svg/sprite.svg#arrow-right"></use>
                                            </svg>
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-5">
                        <div class="sd-affiliate__right">
                            <div class="position-relative ps-4 ps-sm-8">
                                <h5 class="title mb-3"><img src="{{ asset('') }}assets/app/images/svg/h5-header-svg.svg"
                                        alt=""><span>30% Booster Bonus</span></h5>
                                <h2 class="title mb-6"> 30% Booster Bonus allocation</h2>
                                <p class="s18 dark mb-6 ">Refer 7 direct members within the same or higher
                                    package within 7 days. Earn up to 30% Booster
                                    Bonus</p><a
                                    href="{{ route('register') }}"  class="button button--primary ">
                                    <div class="round"></div><span>Join Affiliate</span>
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
       @include('layouts.mainsite.footer');