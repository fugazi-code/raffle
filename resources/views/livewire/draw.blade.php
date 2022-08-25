<div>
    @push('head')
        <script src="{{ asset('vendor/winwheel/Winwheel.min.js') }}"></script>
        <script src="http://cdnjs.cloudflare.com/ajax/libs/gsap/latest/TweenMax.min.js"></script>
    @endpush

    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-7">
                <div class="card">
                    <div class="card-body">
                        <div class="row justify-content-center">
                            <div class="col-md-12 mt-2 text-center m-o">
                                <h1 class="m-0 text-success"><i class="bx bxs-hand-down"></i></h1>
                            </div>
                            <div class="col-md-12 text-center">
                                <canvas id="canvas" width="434" height="434">
                                    <p style="{color: white}" align="center">Sorry, your browser doesn't support canvas. Please try
                                        another.</p>
                                </canvas>
                            </div>
                            <div class="col-md-12 mt-2">
                                <div class="d-grid gap-1" x-data="{nextGame: 1}">
                                    <button x-show="nextGame" @click="nextGame = 0" type="button" class="btn btn-primary" onClick="startSpin();">SPIN NOW</button>
                                    <button x-show="!nextGame" @click="nextGame = 1" type="button" class="btn btn-primary" onClick="resetWheel();">RESET</button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-5">
                <ul class="list-group list-group-flush">
                    @foreach($drawed as $key => $item)
                        <li class="list-group-item">
                            Draw #{{ $key + 1 }} <br>
                            Slot #{{ $item['contestant']['slot_no'] }} <br>
                            {{ $item['contestant']['code_name'] }}
                        </li>
                    @endforeach
                </ul>
            </div>
        </div>
    </div>
    <script>
        // Create new wheel object specifying the parameters at creation time.
        var theWheel = new Winwheel({
            'numSegments': {{ count($contestant) }},     // Specify number of segments.
            'outerRadius': 212,   // Set outer radius so wheel fits inside the background.
            'textFontSize': 28,    // Set font size as desired.
            'segments':        // Define segments including colour and text.
                [
                    @foreach($contestant as $value)
                        {'fillStyle': '{{ \Faker\Factory::create()->hexColor() }}', 'id': '{{ $value->id }}', 'text': '#{{ $value->slot_no }} {{ $value->code_name }}'},
                    @endforeach
                ],
            'animation':           // Specify the animation to use.
                {
                    'type': 'spinToStop',
                    'duration': 10, // Duration in seconds.
                    'spins': 8, // Number of complete spins.
                    'callbackFinished': alertPrize
                }
        });

        // Vars used by the code in this page to do power controls.
        var wheelPower = 0;
        var wheelSpinning = false;

        // -------------------------------------------------------
        // Function to handle the onClick on the power buttons.
        // -------------------------------------------------------
        function powerSelected(powerLevel) {
            // Ensure that power can't be changed while wheel is spinning.
            if (wheelSpinning == false) {
                // Reset all to grey incase this is not the first time the user has selected the power.
                document.getElementById('pw1').className = "";
                document.getElementById('pw2').className = "";
                document.getElementById('pw3').className = "";

                // Now light up all cells below-and-including the one selected by changing the class.
                if (powerLevel >= 1) {
                    document.getElementById('pw1').className = "pw1";
                }

                if (powerLevel >= 2) {
                    document.getElementById('pw2').className = "pw2";
                }

                if (powerLevel >= 3) {
                    document.getElementById('pw3').className = "pw3";
                }

                // Set wheelPower var used when spin button is clicked.
                wheelPower = powerLevel;

                // Light up the spin button by changing it's source image and adding a clickable class to it.
                document.getElementById('spin_button').src = "spin_on.png";
                document.getElementById('spin_button').className = "clickable";
            }
        }

        // -------------------------------------------------------
        // Click handler for spin button.
        // -------------------------------------------------------
        function startSpin() {
            if (wheelPower == 1) {
                theWheel.animation.spins = 3;
            } else if (wheelPower == 2) {
                theWheel.animation.spins = 8;
            } else if (wheelPower == 3) {
                theWheel.animation.spins = 15;
            }

            // Begin the spin animation by calling startAnimation on the wheel object.
            theWheel.startAnimation();
        }

        // -------------------------------------------------------
        // Function for reset button.
        // -------------------------------------------------------
        function resetWheel() {
            theWheel.stopAnimation(false);  // Stop the animation, false as param so does not call callback function.
            theWheel.rotationAngle = 0;     // Re-set the wheel angle to 0 degrees.
            theWheel.draw();                // Call draw to render changes to the wheel.

            document.getElementById('pw1').className = "";  // Remove all colours from the power level indicators.
            document.getElementById('pw2').className = "";
            document.getElementById('pw3').className = "";

            wheelSpinning = false;          // Reset to false to power buttons and spin can be clicked again.
        }

        // -------------------------------------------------------
        // Called when the spin animation has finished by the callback feature of the wheel because I specified callback in the parameters
        // note the indicated segment is passed in as a parmeter as 99% of the time you will want to know this to inform the user of their prize.
        // -------------------------------------------------------
        function alertPrize(indicatedSegment) {
            // Do basic alert of the segment text. You would probably want to do something more interesting with this information.
            alert("You have won " + indicatedSegment.text);
            @this.setDrawed(indicatedSegment.id);
        }
    </script>
</div>
