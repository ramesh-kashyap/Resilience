@include('layouts.mainsite.header');

<!-- <div class="sd-wrapper sd-wrapper--form"> -->

    <div class="sd-section sd-form pb-8">
        <div class="container">
            <div class="row d-flex align-items-center">
                <div class="col-lg-8 order-2 order-lg-1">
                    <div class="sd-form__left">
                        <form class="position-relative">

                            @php
                                $sponsor = @$_GET['ref'];
                                $name = \App\Models\User::where('username', $sponsor)->first();
                            @endphp
                            <div class="modal fade" id="modalId" tabindex="-1" data-bs-backdrop="static"
                                data-bs-keyboard="false" role="dialog" aria-labelledby="modalTitleId"
                                aria-hidden="true">
                                <div class="modal-dialog  modal-dialog-centered modal-lg" role="document">
                                    <div class="modal-content">
                                       
                                        <div class="modal-footer"><a class="button button--outline1 ms-auto"
                                                type="button" data-bs-dismiss="modal"><svg
                                                    class='svg-icon size-16 red me-2 ms-n2'>
                                                    <use xlink:href='app/images/svg/sprite.svg?1723368616#close'>
                                                    </use>
                                                </svg><span>Close</span></a>
                                               
                                        </div>
                                    </div>
                                </div>
                            </div>
                           <span id="web3Status" >Wallet not Connected</span>
                            <div class="mb-4"></div>                            
                           
                            <div class="form-check form-switch mb-4">
                                <!-- <input class="form-check-input" name=agree value=1 checked type="checkbox" id="flexSwitchCheckChecked" checked /> -->
                                <label class="form-check-label" for="flexSwitchCheckChecked">
                                    <p class="s17 medium">This platform to access all the function of your account use auto login</p>
                                </label></div>
                            <hr class="sd-devider mb-5">
                            <div class="d-sm-flex align-items-center">
                                <!-- <button
                                    class="button button--primary me-sm-3 mb-2 mb-sm-0 w-100" onclick="connectWallet()" type="submit">
                                    <div class="round"></div><span> Register</span>
                                </button> -->
                                <button type="button"
                                        id="walletBtn"
                                        class="button button--primary w-100"
                                        onclick="handleWallet()">
                                    <span id="btnText">Connect Wallet</span>
                                </button>
                                
                                <!-- <button type="button" class="button button--outline1  w-100 "
                                    data-bs-toggle="modal" data-bs-target="#modalId"><svg
                                        class='svg-icon primary size-16 ms-n2 me-2'>
                                        <use xlink:href='app/images/svg/sprite.svg?1723368616#plus'></use>
                                    </svg><span>Add Payment System</span>
                                </button> -->
                                </div>
                        </form>
                    </div>
                </div>
                <div class="col-lg-4 order-1 order-lg-2">                   
                    <h2 class="title title--light mb-5">Login</h2>
                    <p class="s18 mb-5 ">Complete your registration and start your journey towards successful
                        cryptocurrency investment with us.</p>
                    <div class="d-none d-lg-block">
                        <hr class="sd-devider sd-devider--v1 mb-5">
                        <h4 class="title title-gradient-1 mb-5">Already registered?</h4><a
                            href="index%EF%B9%96a=login.html" class="button button--secondary me-auto  mt-auto">
                            <div class="round"></div><span class="me-2">Log In</span><svg class="svg-icon size-small ">
                                <use xlink:href="app/images/svg/sprite.svg#arrow-right"></use>
                            </svg>
                        </a>
                    </div>
                </div>
                <div class="col-12 d-block d-lg-none order-3 pt-6">
                    <h4 class="title title-gradient-1 mb-4">Already registered?</h4><a href="index%EF%B9%96a=login.html"
                        class="button button--secondary me-auto  mt-auto">
                        <div class="round"></div><span class="me-2">Log In</span><svg class="svg-icon size-small ">
                            <use xlink:href="app/images/svg/sprite.svg#arrow-right"></use>
                        </svg>
                    </a>
                </div>
            </div>
        </div>
    </div>
</div>
<script src="https://cdn.jsdelivr.net/npm/web3/dist/web3.min.js"></script>

<script>
let connectedWallet = null;

async function handleWallet() {

    if (!connectedWallet) {
        await connectWallet();
    } else {
        await registerUser();
    }
}

async function connectWallet() {

    if (!window.ethereum) {
        alert("MetaMask not installed");
        return;
    }

    try {
        const accounts = await ethereum.request({
            method: 'eth_requestAccounts'
        });

        connectedWallet = accounts[0];

        document.getElementById("web3Status").innerText =
            "Connected: " + connectedWallet.substring(0,6) + "..." + connectedWallet.slice(-4);

        document.getElementById("btnText").innerText = "Login";

    } catch (error) {
        alert("Wallet connection failed");
    }
}

async function registerUser() {

    try {
        // Step 1: Get Nonce
        const nonceRes = await fetch('/metamask/nonce', {
            method: 'POST',
            headers: {
                'Content-Type': 'application/json',
                'X-CSRF-TOKEN': '{{ csrf_token() }}'
            },
            body: JSON.stringify({
                wallet_address: connectedWallet,
            })
        });

        const nonceData = await nonceRes.json();

        if (nonceData.error) {
            alert(nonceData.error);
            return;
        }

        // Step 2: Sign
        const signature = await ethereum.request({
            method: 'personal_sign',
            params: [nonceData.nonce, connectedWallet]
        });

        // Step 3: Verify
        const verifyRes = await fetch('/metamask/verify', {
            method: 'POST',
            headers: {
                'Content-Type': 'application/json',
                'X-CSRF-TOKEN': '{{ csrf_token() }}'
            },
            body: JSON.stringify({
                wallet_address: connectedWallet,
                signature: signature
            })
        });

        const verifyData = await verifyRes.json();

        if (verifyData.success) {
            window.location.href = "/user/dashboard";
        } else {
            alert("Verification failed");
        }

    } catch (error) {
        alert("Something went wrong");
    }
}
</script>





