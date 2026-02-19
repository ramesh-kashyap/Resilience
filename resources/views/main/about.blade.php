<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>About Us — ZPE LABS</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/animejs/3.2.1/anime.min.js"></script>

    <link rel="icon" type="image/png" href="{{asset('')}}favicon-96x96.png" sizes="96x96" />
    <link rel="icon" type="image/svg+xml" href="{{asset('')}}favicon.svg" />
    <link rel="shortcut icon" href="{{asset('')}}favicon.ico" />
    <link rel="apple-touch-icon" sizes="180x180" href="{{asset('')}}apple-touch-icon.png" />
    <meta name="apple-mobile-web-app-title" content="ZPE LABS" />

    <style>
        :root {
            --bc-bg: #050c1c;
            --bc-panel: rgba(12, 18, 40, 0.68);
            --bc-border: rgba(122, 149, 255, 0.28);
            --bc-accent: #0fb2ff;
            --bc-accent2: #274f98;
            --bc-text: #e7ecff;
            --bc-muted: #9bb5ff;
        }

        html,
        body {
            height: 100%;
            margin: 0;
            background: var(--bc-bg);
            color: var(--bc-text);
            font-family: Inter, ui-sans-serif, system-ui, -apple-system, Segoe UI, Roboto, Arial;
            overflow: hidden
        }

        main.deck {
            height: 100vh;
            overflow-y: auto;
            scroll-snap-type: y mandatory;
            scroll-behavior: smooth;
            perspective: 1400px
        }

        section.slide {
            position: relative;
            min-height: 100vh;
            scroll-snap-align: start;
            display: flex;
            align-items: center;
            justify-content: center;
            padding: 4rem 1.25rem;
            transform-style: preserve-3d;
            content-visibility: auto;
            contain-intrinsic-size: 1000px
        }

        .stage {
            position: relative;
            width: min(1200px, 100%);
            min-height: 72vh;
            border: 1px solid var(--bc-border);
            border-radius: 1.25rem;
            overflow: hidden;
            background: linear-gradient(180deg, rgba(14, 22, 48, .62), rgba(8, 14, 34, .62));
            box-shadow: 0 40px 120px rgba(0, 0, 0, .6);
            transform-style: preserve-3d;
            transition: transform .4s ease
        }

        .stage {
            transform: translateZ(calc((1 - var(--scroll, 0)) * 200px)) rotateX(calc((.5 - var(--scroll, 0)) * 16deg)) scale(calc(1 - (abs(.5 - var(--scroll, 0)) * .05)))
        }

        .parallax {
            position: absolute;
            inset: 0;
            pointer-events: none
        }

        .stage[data-aurora="1"]::after {
            content: "";
            position: absolute;
            inset: -20%;
            pointer-events: none;
            background:
                radial-gradient(32% 24% at 18% 20%, rgba(15, 178, 255, .16), transparent 60%),
                radial-gradient(28% 22% at 82% 78%, rgba(39, 79, 152, .18), transparent 60%);
            filter: blur(38px);
            opacity: .22;
            animation: aurora 16s ease-in-out infinite alternate;
        }

        @keyframes aurora {
            0% {
                transform: translate3d(-2%, -1%, 0) rotate(0deg)
            }

            50% {
                transform: translate3d(1%, 1%, 0) rotate(8deg)
            }

            100% {
                transform: translate3d(2%, -1%, 0) rotate(0deg)
            }
        }

        .reveal {
            opacity: 0;
            transform: translateY(12px) scale(.995);
            filter: blur(.35px);
            transition: opacity .6s ease, transform .6s ease, filter .6s ease
        }

        .reveal.in {
            opacity: 1;
            transform: none;
            filter: none
        }

        .delay-1 {
            transition-delay: .08s
        }

        .delay-2 {
            transition-delay: .16s
        }

        .delay-3 {
            transition-delay: .24s
        }

        .btn {
            display: inline-flex;
            align-items: center;
            gap: 8px;
            padding: 10px 14px;
            border-radius: 12px;
            border: 1px solid var(--bc-border);
            background: linear-gradient(100deg, #0f2f64, #0a2446);
            font-weight: 800;
            letter-spacing: .03em
        }

        .btn.primary {
            background: linear-gradient(100deg, #4f93ff, var(--bc-accent));
            color: #071126;
            border-color: rgba(111, 114, 255, .45);
            box-shadow: 0 8px 22px rgba(0, 231, 255, .18), 0 4px 10px rgba(15, 30, 80, .35)
        }

        .dotnav {
            position: fixed;
            right: .75rem;
            top: 50%;
            transform: translateY(-50%);
            display: grid;
            gap: .7rem;
            z-index: 50
        }

        .dotnav button {
            width: 12px;
            height: 12px;
            border-radius: 50%;
            background: #1a3566;
            border: 1px solid var(--bc-border);
            box-shadow: 0 0 0 rgba(15, 178, 255, 0);
            transition: background .2s ease, transform .2s ease, box-shadow .2s ease
        }

        .dotnav button.active {
            background: var(--bc-accent);
            box-shadow: 0 0 18px rgba(15, 178, 255, .4);
            transform: scale(1.12)
        }

        @media (max-width:820px) {
            .dotnav {
                display: none
            }
        }

        .slide-index {
            position: fixed;
            left: 14px;
            top: 50%;
            transform: translateY(-50%);
            display: grid;
            gap: 8px;
            z-index: 60;
            pointer-events: auto
        }

        .slide-index a {
            display: grid;
            grid-template-columns: auto 1fr;
            align-items: center;
            gap: 10px;
            padding: 8px 10px;
            border-radius: 12px;
            background: linear-gradient(180deg, rgba(14, 22, 48, .6), rgba(10, 18, 40, .6));
            border: 1px solid var(--bc-border);
            color: var(--bc-text);
            font-size: 12px;
            letter-spacing: .02em;
            box-shadow: inset 0 0 0 1px rgba(122, 149, 255, .06);
            transition: transform .15s ease, box-shadow .15s ease, background .15s ease, opacity .15s ease;
            opacity: .9;
            text-decoration: none
        }

        .slide-index a span {
            display: inline-block;
            width: 28px;
            text-align: center;
            font-weight: 800;
            color: var(--bc-muted)
        }

        .slide-index a b {
            font-weight: 800;
            opacity: .95
        }

        .slide-index a:hover {
            transform: translateY(-1px);
            box-shadow: 0 10px 22px rgba(10, 36, 70, .35);
            opacity: 1
        }

        .slide-index a.active {
            background: linear-gradient(100deg, #4f93ff, var(--bc-accent));
            color: #071126;
            border-color: rgba(111, 114, 255, .45);
            box-shadow: 0 8px 22px rgba(0, 231, 255, .18)
        }

        @media (max-width:900px) {
            .slide-index {
                left: 0;
                right: 0;
                top: auto;
                bottom: 10px;
                transform: none;
                display: flex;
                gap: 8px;
                padding: 0 10px;
                overflow-x: auto;
                scrollbar-width: none
            }

            .slide-index::-webkit-scrollbar {
                display: none
            }

            .slide-index a {
                flex: 0 0 auto;
                display: flex;
                align-items: center;
                gap: 8px;
                padding: 8px 12px
            }

            .slide-index a b {
                display: inline
            }
        }

        details summary::-webkit-details-marker {
            display: none
        }

        details summary::after {
            content: '▾';
            position: absolute;
            right: 1rem;
            top: 50%;
            transform: translateY(-50%);
            opacity: .8;
            transition: transform .3s ease
        }

        details[open] summary::after {
            content: '▴'
        }

        .holo {
            position: relative
        }

        .holo::before {
            content: "";
            position: absolute;
            inset: 0;
            padding: 1px;
            border-radius: inherit;
            pointer-events: none;
            background: conic-gradient(from var(--ang, 0deg), rgba(15, 178, 255, .0), rgba(15, 178, 255, .35), rgba(39, 79, 152, .25), rgba(15, 178, 255, .0) 75%);
            -webkit-mask: linear-gradient(#000 0 0) content-box, linear-gradient(#000 0 0);
            -webkit-mask-composite: xor;
            mask-composite: exclude;
            animation: spin 14s linear infinite;
            opacity: .6;
        }

        @keyframes spin {
            to {
                --ang: 360deg;
            }
        }

        #coin-img {
            animation: float 7s ease-in-out infinite
        }

        @keyframes float {
            0% {
                transform: translateY(0)
            }

            50% {
                transform: translateY(-8px)
            }

            100% {
                transform: translateY(0)
            }
        }

        a:focus-visible,
        button:focus-visible {
            outline: 2px solid var(--bc-accent);
            outline-offset: 2px
        }
    </style>
</head>

<body>
    <header
        class="w-full flex items-center justify-between px-6 py-3 fixed top-0 z-50 backdrop-blur-md bg-gradient-to-b from-[#0c162c] to-transparent border-b border-[rgba(122,149,255,0.15)]">
        <a href="{{asset('')}}"
            class="flex items-center gap-3 font-bold uppercase text-xs text-[var(--bc-muted)] tracking-widest">
            <span class="block w-2 h-2 rounded-full bg-[var(--bc-accent)] shadow-[0_0_12px_var(--bc-accent)]"></span>
            ZPE LABS
        </a>
        <div class="flex gap-3">
            <a href="{{asset('')}}" class="btn text-sm">Home</a>
        </div>
        <div class="absolute bottom-0 left-0 right-0 h-[2px] bg-[rgba(122,149,255,0.25)] overflow-hidden">
            <span id="top-progress"
                class="block h-full w-0 bg-gradient-to-r from-[var(--bc-accent2)] to-[var(--bc-accent)]"></span>
        </div>
    </header>

    <nav class="slide-index" id="SlideIndex" aria-label="Slides">
        <a href="#hero" data-target="hero"><span>01</span><b>Introduction</b></a>
        <a href="#mission" data-target="mission"><span>02</span><b>Our Edge</b></a>
        <a href="#network" data-target="network"><span>03</span><b>Profit Engine</b></a>
        <a href="#referral" data-target="referral"><span>04</span><b>The Alliance</b></a>
        <a href="#history" data-target="history"><span>05</span><b>Roadmap</b></a>
    </nav>

    <div class="dotnav" id="DotNav" aria-label="Slide dots">
        <button aria-label="Introduction"></button>
        <button aria-label="Our Edge"></button>
        <button aria-label="Profit Engine"></button>
        <button aria-label="The Alliance"></button>
        <button aria-label="Roadmap"></button>
    </div>

    <main class="deck mt-[60px]" id="deck">
        <section class="slide" id="hero">
            <div class="stage" data-aurora="1">
                <div class="parallax" data-depth="-3">
                    <div class="absolute inset-0 flex items-end justify-center overflow-hidden"
                        style="transform:perspective(1200px) rotateX(65deg);">
                        <div class="w-[150%] h-[180%] bg-repeat opacity-40"
                            style="background-image:
                  linear-gradient(90deg,transparent 95%,rgba(122,149,255,.25) 95%),
                  linear-gradient(transparent 95%,rgba(122,149,255,.25) 95%);
                  background-size:40px 40px;
                  mask-image:radial-gradient(75% 60% at 50% 20%,#000 50%,transparent 80%);">
                        </div>
                    </div>
                </div>
                <div class="relative grid lg:grid-cols-2 gap-8 p-6">
                    <div class="reveal">
                        <span
                            class="flex items-center gap-2 text-[var(--bc-muted)] uppercase tracking-[.14em] text-xs"><span
                                class="w-2 h-2 rounded-full bg-[var(--bc-accent)] shadow-[0_0_12px_var(--bc-accent)] inline-block"></span>About
                            ZPE LABS</span>
                        <h1 class="text-5xl md:text-7xl font-extrabold mt-3 reveal delay-1">The Architecture of
                            Next-Generation Alpha</h1>
                        <p class="text-base md:text-lg mt-4 reveal delay-2">ZPE LABS is a quantitative investment
                            protocol that leverages proprietary AI to generate institutional-grade yield in the digital
                            asset markets.</p>
                        <div class="flex gap-4 mt-6 reveal delay-3">
                            <a href="{{ route('register') }}" class="btn primary text-sm text-white">Create Account</a>
                            <a href="{{asset('')}}document.pdf" class="btn text-sm" target="_blank" rel="noopener">Our
                                document</a>
                        </div>
                    </div>
                    <div class="flex items-center justify-center relative z-10 parallax" data-depth="1">
                        <div class="relative" style="perspective:800px;">
                            <img src="{{asset('')}}images/token-coin.png" alt="ZPE LABS coin" class="w-full max-w-[500px]"
                                id="coin-img">
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <section class="slide" id="mission">
            <div class="stage holo" data-aurora="1">
                <div class="parallax" data-depth="-2">
                    <div class="absolute inset-0"
                        style="background:
          radial-gradient(900px 420px at 80% 15%, rgba(39,79,152,.2), transparent 60%),
          radial-gradient(840px 480px at 10% 90%, rgba(15,178,255,.18), transparent 60%);">
                    </div>
                </div>
                <div class="relative p-6 flex flex-col items-start space-y-6">
                    <div class="reveal">
                        <span
                            class="flex items-center gap-2 text-[var(--bc-muted)] uppercase tracking-[.14em] text-xs"><span
                                class="w-2 h-2 rounded-full bg-[var(--bc-accent)] shadow-[0_0_12px_var(--bc-accent)] inline-block"></span>Our
                            Edge</span>
                        <h2 class="reveal delay-1 text-3xl md:text-4xl font-bold">Democratizing Quantitative Finance
                        </h2>
                        <p class="mt-3 text-base md:text-lg reveal delay-2">For decades, the world's most profitable
                            trading strategies have been the exclusive domain of elite hedge funds. ZPE LABS was
                            founded to shatter this paradigm. We deploy sophisticated, AI-driven quantitative models to
                            unlock consistent alpha, making institutional-level returns accessible to our global user
                            base.</p>
                    </div>
                    <figure
                        class="relative w-full h-64 md:h-80 lg:h-96 overflow-hidden rounded-lg border border-[var(--bc-border)] reveal delay-2">
                        <img src="{{asset('')}}images/blockchain.webp" alt="Futuristic network skyline"
                            class="w-full h-full object-cover">
                    </figure>
                    <div class="grid sm:grid-cols-3 gap-5 w-full mt-6">
                        <div class="p-4 rounded-xl border border-[var(--bc-border)] bg-[var(--bc-panel)] reveal holo">
                            <strong class="uppercase tracking-wider text-sm">Algorithmic Precision</strong>
                            <p class="text-sm opacity-90 mt-1">Our strategies operate 24/7 without human emotion,
                                executing thousands of trades per minute with machine precision.</p>
                        </div>
                        <div
                            class="p-4 rounded-xl border border-[var(--bc-border)] bg-[var(--bc-panel)] reveal delay-1 holo">
                            <strong class="uppercase tracking-wider text-sm">Asymmetric Opportunities</strong>
                            <p class="text-sm opacity-90 mt-1">We specialize in identifying market inefficiencies and
                                exploiting arbitrage gaps that are invisible to the average investor.</p>
                        </div>
                        <div
                            class="p-4 rounded-xl border border-[var(--bc-border)] bg-[var(--bc-panel)] reveal delay-2 holo">
                            <strong class="uppercase tracking-wider text-sm">Radical Transparency</strong>
                            <p class="text-sm opacity-90 mt-1">While our core algorithms are proprietary, our
                                performance and operations are fully transparent to our partners.</p>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <section class="slide" id="network">
            <div class="stage holo" data-aurora="1">
                <div class="parallax" data-depth="-2">
                    <div class="absolute inset-0"
                        style="background:
          radial-gradient(900px 420px at 80% 20%, rgba(39,79,152,.16), transparent 60%),
          radial-gradient(860px 480px at 15% 75%, rgba(15,178,255,.14), transparent 60%);">
                    </div>
                </div>
                <div class="relative p-6 flex flex-col space-y-6">
                    <div class="reveal">
                        <span
                            class="flex items-center gap-2 text-[var(--bc-muted)] uppercase tracking-[.14em] text-xs"><span
                                class="w-2 h-2 rounded-full bg-[var(--bc-accent)] shadow-[0_0_12px_var(--bc-accent)] inline-block"></span>Profit
                            Generation Engine</span>
                        <h2 class="mt-2 reveal delay-1 text-3xl md:text-4xl font-bold">How We Generate Returns</h2>
                        <p class="mt-3 text-base md:text-lg reveal delay-2">ZPE LABS's profitability is not based on
                            speculation. It is the result of a systematic, multi-strategy approach executed by our core
                            technology, the <strong>Orion AI Core</strong>.</p>
                    </div>
                    <figure
                        class="relative w-full h-64 md:h-80 lg:h-96 overflow-hidden rounded-lg border border-[var(--bc-border)] reveal delay-2">
                        <img src="{{asset('')}}images/panorama.webp" alt="Futuristic network skyline"
                            class="w-full h-full object-cover">
                    </figure>
                    <div class="grid sm:grid-cols-3 gap-5 mt-4">
                        <div
                            class="p-4 rounded-xl border border-[var(--bc-border)] bg-[var(--bc-panel)] reveal delay-1 holo">
                            <strong class="uppercase tracking-wider text-sm">High-Frequency Arbitrage</strong>
                            <p class="text-sm opacity-90 mt-1">Simultaneously buying and selling assets on different
                                exchanges to profit from minute price discrepancies.</p>
                        </div>
                        <div
                            class="p-4 rounded-xl border border-[var(--bc-border)] bg-[var(--bc-panel)] reveal delay-2 holo">
                            <strong class="uppercase tracking-wider text-sm">Decentralized Market Making</strong>
                            <p class="text-sm opacity-90 mt-1">Providing liquidity to DeFi protocols and earning fees
                                on millions of micro-transactions.</p>
                        </div>
                        <div
                            class="p-4 rounded-xl border border-[var(--bc-border)] bg-[var(--bc-panel)] reveal delay-3 holo">
                            <strong class="uppercase tracking-wider text-sm">Predictive Analytics</strong>
                            <p class="text-sm opacity-90 mt-1">Our AI models forecast short-term market movements,
                                enabling us to position capital ahead of trends.</p>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <section class="slide" id="referral">
            <div class="stage holo" data-aurora="1">
                <div class="parallax" data-depth="-2">
                    <div class="absolute inset-0"
                        style="background:
          radial-gradient(820px 440px at 25% 20%, rgba(39,79,152,.15), transparent 60%),
          radial-gradient(900px 460px at 75% 80%, rgba(15,178,255,.13), transparent 60%);">
                    </div>
                </div>
                <div class="relative p-6 flex flex-col space-y-6">
                    <div class="reveal">
                        <span
                            class="flex items-center gap-2 text-[var(--bc-muted)] uppercase tracking-[.14em] text-xs"><span
                                class="w-2 h-2 rounded-full bg-[var(--bc-accent)] shadow-[0_0_12px_var(--bc-accent)] inline-block"></span>The
                            Alliance</span>
                        <h2 class="mt-2 reveal delay-1 text-3xl md:text-4xl font-bold">Growth Through Strategic
                            Partnership</h2>
                        <p class="mt-3 text-base md:text-lg reveal delay-2">The ZPE LABS Alliance is more than a
                            referral program; it's a shared-success ecosystem. We empower our partners with the tools
                            and incentives to build their own communities, rewarding network growth with compounding
                            benefits.</p>
                    </div>
                    <div class="grid sm:grid-cols-4 gap-4 mt-6">
                        <div
                            class="p-4 rounded-xl border border-[var(--bc-border)] bg-[var(--bc-panel)] reveal delay-1 holo">
                            <div
                                class="w-16 h-16 rounded-full bg-[conic-gradient(from_120deg,var(--bc-accent2),var(--bc-accent),#1a3a6d,var(--bc-accent2))] text-white grid place-items-center font-black text-[#081126] shadow-[0_0_18px_rgba(15,178,255,.25)]">
                                6%</div>
                            <small class="uppercase tracking-[.14em] opacity-80">Level 1</small>
                            <strong>Direct Partners</strong>
                            <p>Maximum commission on direct network growth.</p>
                        </div>
                        <div
                            class="p-4 rounded-xl border border-[var(--bc-border)] bg-[var(--bc-panel)] reveal delay-2 holo">
                            <div
                                class="w-16 h-16 rounded-full bg-[conic-gradient(from_120deg,var(--bc-accent2),var(--bc-accent),#1a3a6d,var(--bc-accent2))] text-white grid place-items-center font-black text-[#081126] shadow-[0_0_18px_rgba(15,178,255,.25)]">
                                2%</div>
                            <small class="uppercase tracking-[.14em] opacity-80">Level 2</small>
                            <strong>Network Expansion</strong>
                            <p>Earn from your partners' success.</p>
                        </div>
                        <div
                            class="p-4 rounded-xl border border-[var(--bc-border)] bg-[var(--bc-panel)] reveal delay-3 holo">
                            <div
                                class="w-16 h-16 rounded-full bg-[conic-gradient(from_120deg,var(--bc-accent2),var(--bc-accent),#1a3a6d,var(--bc-accent2))] text-white grid place-items-center font-black text-[#081126] shadow-[0_0_18px_rgba(15,178,255,.25)]">
                                1%</div>
                            <small class="uppercase tracking-[.14em] opacity-80">Ecosystem Depth</strong>
                                <p>Sustained rewards from network depth.</p>
                        </div>
                        <div
                            class="p-4 rounded-xl border border-[var(--bc-border)] bg-[var(--bc-panel)] reveal delay-3 holo">
                            <div
                                class="w-16 h-16 rounded-full bg-[conic-gradient(from_120deg,var(--bc-accent2),var(--bc-accent),#1a3a6d,var(--bc-accent2))] grid place-items-center font-black text-[#081126] text-white shadow-[0_0_18px_rgba(15,178,255,.25)]">
                                1%</div>
                            <small class="uppercase tracking-[.14em] opacity-80">Ambassador</strong>
                                <p>Exclusive bonuses for top performers.</p>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <section class="slide" id="history">
            <div class="stage holo" data-aurora="1">
                <div class="parallax" data-depth="-2">
                    <div class="absolute inset-0"
                        style="background:
          radial-gradient(820px 440px at 25% 20%, rgba(39,79,152,.16), transparent 60%),
          radial-gradient(900px 460px at 80% 80%, rgba(15,178,255,.13), transparent 60%);">
                    </div>
                </div>
                <div class="relative p-6 flex flex-col space-y-6">
                    <div class="reveal">
                        <span
                            class="flex items-center gap-2 text-[var(--bc-muted)] uppercase tracking-[.14em] text-xs"><span
                                class="w-2 h-2 rounded-full bg-[var(--bc-accent)] shadow-[0_0_12px_var(--bc-accent)] inline-block"></span>Our
                            Roadmap</span>
                        <h2 class="mt-2 reveal delay-1 text-3xl md:text-4xl font-bold">From Blueprint to a New Economy
                        </h2>
                    </div>
                    <div class="grid gap-5">
                        <div class="p-4 rounded-xl border border-[var(--bc-border)] bg-[var(--bc-panel)] reveal holo">
                            <h3 class="font-semibold text-lg mb-1">Q1 2026: The ZPE LABS DAO</h3>
                            <p>Launch of the $BLC governance token, decentralizing protocol ownership and empowering the
                                community to guide its future.</p>
                        </div>
                        <div
                            class="p-4 rounded-xl border border-[var(--bc-border)] bg-[var(--bc-panel)] reveal delay-1 holo">
                            <h3 class="font-semibold text-lg mb-1">Q4 2025: Layer-2 Expansion</h3>
                            <p>Integration with leading L2 scaling solutions to dramatically reduce transaction costs
                                and increase capital velocity.</p>
                        </div>
                        <div
                            class="p-4 rounded-xl border border-[var(--bc-border)] bg-[var(--bc-panel)] reveal delay-2 holo">
                            <h3 class="font-semibold text-lg mb-1">Q3 2025: Public Protocol Launch</h3>
                            <p>Official launch of the ZPE LABS investment platform, opening access to our quantitative
                                strategies for global users.</p>
                        </div>
                        <div
                            class="p-4 rounded-xl border border-[var(--bc-border)] bg-[var(--bc-panel)] reveal delay-3 holo">
                            <h3 class="font-semibold text-lg mb-1">2023-2024: The Genesis Phase</h3>
                            <p>Development and backtesting of the Orion AI Core. Secured seed funding from strategic
                                venture capital partners.</p>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </main>

    <svg width="0" height="0" style="position:absolute">
        <defs>
            <linearGradient id="grad" x1="0" y1="0" x2="1" y2="1">
                <stop offset="0%" stop-color="#274f98" />
                <stop offset="100%" stop-color="#0fb2ff" />
            </linearGradient>
        </defs>
    </svg>

    <script>
        (function() {
            const deck = document.getElementById('deck');
            const slides = Array.from(deck.querySelectorAll('.slide'));
            const progressBar = document.getElementById('top-progress');
            const dots = Array.from(document.getElementById('DotNav').children);
            const slideIndex = document.getElementById('SlideIndex');
            const slideLinks = Array.from(slideIndex.querySelectorAll('a'));
            const idMap = Object.fromEntries(slideLinks.map(a => [a.dataset.target, document.getElementById(a.dataset
                .target)]));

            // Scroll + parallax + active markers
            function update() {
                const maxScroll = deck.scrollHeight - deck.clientHeight;
                const p = maxScroll ? deck.scrollTop / maxScroll : 0;
                progressBar.style.width = (p * 100).toFixed(1) + '%';
                const vh = deck.clientHeight;
                slides.forEach(slide => {
                    const rect = slide.getBoundingClientRect();
                    const center = (vh / 2 - (rect.top + rect.height / 2)) / vh;
                    const prog = Math.max(0, Math.min(1, 1 - Math.abs((rect.top + rect.height / 2 - vh / 2) / (
                        rect.height / 2))));
                    slide.querySelector('.stage').style.setProperty('--scroll', prog.toFixed(3));
                    slide.querySelectorAll('.parallax').forEach(el => {
                        const d = parseFloat(el.dataset.depth || 0);
                        const dx = center * d * -40;
                        const dz = d * -70 * (prog - 0.5);
                        el.style.transform = `translate3d(${dx.toFixed(2)}px,0,${dz.toFixed(2)}px)`;
                    });
                });
                // Active dot + left index + hash
                slides.forEach((s, i) => {
                    const r = s.getBoundingClientRect();
                    const mid = r.top + r.height / 2;
                    const active = (mid > 0 && mid < vh);
                    dots[i].classList.toggle('active', active);
                    const id = s.getAttribute('id');
                    slideLinks.forEach(a => a.classList.toggle('active', a.dataset.target === id && active));
                    if (active) history.replaceState(null, '', '#' + id);
                });
            }
            deck.addEventListener('scroll', () => requestAnimationFrame(update));
            update();

            // Click navs
            dots.forEach((btn, i) => btn.addEventListener('click', () => slides[i].scrollIntoView({
                behavior: 'smooth'
            })));
            slideLinks.forEach(a => a.addEventListener('click', e => {
                e.preventDefault();
                idMap[a.dataset.target]?.scrollIntoView({
                    behavior: 'smooth'
                });
            }));

            // Reveal IO
            const io = new IntersectionObserver(entries => {
                entries.forEach(e => {
                    if (e.isIntersecting) {
                        e.target.classList.add('in');
                        io.unobserve(e.target);
                    }
                });
            }, {
                root: deck,
                threshold: .15
            });
            document.querySelectorAll('.reveal').forEach(el => io.observe(el));
        })();
    </script>
</body>

</html>
