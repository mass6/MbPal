    <div v-if="phoneType=='iphone'">
        <div id="iphoneWizardForm">
            <!-- Steps -->
            <div class="steps steps-sm row" data-plugin="matchHeight" data-by-row="true" role="tablist">

                <div class="step col-md-4 current" data-target="#downloadMoves" role="tab">
                    <span class="step-number">1</span>
                    <div class="step-desc">
                        <span class="step-title visible-md visible-lg">Step 1. Download Moves</span>
                        <span class="step-title hidden-md hidden-lg">Download Moves</span>
                        <p>Download the Moves app</p>
                    </div>
                </div>
                <div class="step col-md-4" data-target="#connectMobilityPal" role="tab">
                    <span class="step-number">2</span>
                    <div class="step-desc">
                        <span class="step-title visible-md visible-lg">Step 2. Connect</span>
                        <span class="step-title hidden-md hidden-lg">Connect</span>
                        <p>Connect and authorize MobilityPal</p>
                    </div>
                </div>
                <div class="step col-md-4" data-target="#registrationFinished" role="tab">
                    <span class="step-number">3</span>
                    <div class="step-desc">
                        <span class="step-title visible-md visible-lg">Step 3. Finished</span>
                        <span class="step-title hidden-md hidden-lg">Finished</span>
                        <p>Registration Complete!</p>
                    </div>
                </div>
            </div>
            <!-- End Steps -->
            <!-- Wizard Content -->
            <div class="wizard-content">
                <div class="wizard-pane active" id="downloadMoves" role="tabpanel">
                    <div class="moves-wrapper row">
                        <div class="col-lg-3 col-md-6">
                            <a class="center-block" href="http://appstore.com/moves" target="_blank"><img id="moves-logo" class="center-block" src="/images/moves-logo.png" width="150" ></a>
                            <a class="moves-download btn btn-lg btn-primary bg-blue-grey-800 center-block " href="http://appstore.com/moves" target="_blank"><i class="icon bd-apple" aria-hidden="true"></i> Download for iPhone</a>
                        </div>
                        <div class="col-lg-3 col-md-6">
                            <img id="header-bg-img" class="center-block" src="/images/moves-on-iphone5s.jpg" width="240" >
                        </div>
                    </div>
                </div>
                <div class="wizard-pane" id="connectMobilityPal" role="tabpanel">
                    <div class="margin-bottom-50">
                        <h4 style="line-height:1.8;">
                            <i class="icon wb-alert-circle" aria-hidden="true"></i>Open the Moves app, and select <mark class="bg-blue-grey-500">Connected Apps</mark> from the menu.
                        </h4>
                        <div class="">
                            <img class="img-rounded img-bordered img-bordered-primary margin-vertical-5" src="/images/moves-app-ios-menu.png" width="200" style="margin-right: 6px;">
                            <img class="img-rounded img-bordered img-bordered-primary margin-vertical-5" src="/images/moves-connected-apps-ios.png" width="200">
                        </div>
                    </div>
                    <div class="margin-bottom-50">
                        <h4 style="line-height:1.8;">
                            <i class="icon wb-alert-circle" aria-hidden="true"></i>Click <mark class="bg-blue-grey-500">Enter Pin</mark>, and enter the pin code you receive <a href="{{{ $authUrl }}}" target="_blank">here</a>. Then, click <mark class="bg-blue-grey-500">OK</mark>.
                        </h4>
                        <div class="mv-20">
                            <img class="img-rounded img-bordered img-bordered-primary margin-vertical-5" src="/images/moves-connected-apps.png" width="200" style="margin-right: 6px;">
                            <img class="img-rounded img-bordered img-bordered-primary margin-vertical-5" src="/images/moves-enter-pincode.png" width="200" style="margin-right: 6px;">
                        </div>
                    </div>
                    <div class="margin-bottom-50">
                        <h4 style="line-height:1.8;">
                            <i class="icon wb-alert-circle" aria-hidden="true"></i>Click <mark class="bg-blue-grey-500">Allow</mark> to allow MobilityPal to access your <strong>Moves</strong> app data.
                        </h4>
                        <div class="mv-20">
                            <img class="img-rounded img-bordered img-bordered-primary margin-vertical-5" src="/images/moves-allow-iphone.png" width="200">
                        </div>

                        <div class="margin-top-40 margin-bottom-50">
                            <p id="access-token-btn" class="">
                                <a href="{{{ $authUrl }}}" target="_blank" class="btn btn btn-success bg-green-800 btn-lg"><i class="icon wb-check" aria-hidden="true"></i> Get Your Access Pin Now!</a>
                            </p>
                        </div>
                    </div>
                </div>
                @include('moves._finished')
            </div>
            <!-- End Wizard Content -->
        </div>
    </div>