<div>
    @push('head')
        <script src="{{ asset('vendor/winwheel/Winwheel.min.js') }}"></script>
        <script src="http://cdnjs.cloudflare.com/ajax/libs/gsap/latest/TweenMax.min.js"></script>
    @endpush

    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-body">
                        <div class="row justify-content-center">
                            <div class="col-md-12 mt-2 text-center m-o">
                                <h1 class="m-0 text-success">
                                    <i class="bx bxs-hand-down" style="font-size: 36px;"></i>
                                </h1>
                            </div>
                            <div class="col-md-12 text-center">
                                <canvas id="canvas" width="800" height="800">
                                    <p style="{color: white}" align="center">Sorry, your browser doesn't support canvas.
                                        Please try
                                        another.</p>
                                </canvas>
                            </div>
                            <div class="col-md-12 mt-2">
                                <div class="d-grid gap-1" x-data="{nextGame: 1}">
                                    <button x-show="nextGame" @click="nextGame = 0" type="button"
                                            class="btn btn-primary" onClick="startSpin();">SPIN NOW
                                    </button>
                                    <button x-show="!nextGame" @click="nextGame = 1" type="button"
                                            class="btn btn-primary" onClick="resetWheel();">RESET
                                    </button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <ul class="list-group list-group-flush">
                    @foreach($drawed as $key => $item)
                        <li class="list-group-item">
                            <strong>Draw #{{ $key + 1 }}</strong> <br>
                            Slot #{{ $item['contestant']['slot_no'] }} <br>
                            {{ $item['contestant']['code_name'] }}
                            <a href="#" wire:click="removeDraw({{ $item['id'] }})"
                               class="btn btn-sm btn-danger text-white mt-2">
                                <i class="bx bx-window-close"></i>
                            </a>
                        </li>
                    @endforeach
                </ul>
            </div>
        </div>
    </div>

    <div wire:ignore class="modal fade" id="winnerModal" data-bs-backdrop="static" data-bs-keyboard="false"
         tabindex="-1"
         aria-labelledby="winnerModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">We got a Winner!~</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="row justify-content-center">
                        <div class="col-auto">
                            <h2 id="winner-label"></h2>
                        </div>
                        <div class="col-12"></div>
                        <div class="col-auto">
                            @php $rand = \Faker\Factory::create()->randomElement(['a', 'b', 'c']) @endphp
                            @if($rand == 'a')
                                <iframe src="https://giphy.com/embed/26u4exk4zsAqPcq08" width="480" height="270"
                                        frameBorder="0" class="giphy-embed" allowFullScreen></iframe><p><a
                                        href="https://giphy.com/gifs/awkwafina-26u4exk4zsAqPcq08"></a></p>
                            @elseif($rand == 'b')
                                <iframe src="https://giphy.com/embed/3o7bu57lYhUEFiYDSM" width="480" height="310"
                                        frameBorder="0" class="giphy-embed" allowFullScreen></iframe><p><a
                                        href="https://giphy.com/gifs/alroker-al-roker-3o7bu57lYhUEFiYDSM"></a></p>
                            @elseif($rand == 'c')
                                <iframe src="https://giphy.com/embed/sVnKj2wDhUTsFKFWhx" width="480" height="400"
                                        frameBorder="0" class="giphy-embed" allowFullScreen></iframe><p><a
                                        href="https://giphy.com/gifs/theoffice-sVnKj2wDhUTsFKFWhx"></a></p>
                            @endif
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-primary" onclick="reloadPage()">Close</button>
                </div>
            </div>
        </div>
    </div>
    @push('scripts')
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"
                integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM"
                crossorigin="anonymous"></script>
        <script type="text/javascript">

            // Create new wheel object specifying the parameters at creation time.
            var theWheel = new Winwheel({
                'numSegments': {{ count($contestant) }},     // Specify number of segments.
                'outerRadius': 380,   // Set outer radius so wheel fits inside the background.
                'textFontSize': 15,    // Set font size as desired.
                'segments':        // Define segments including colour and text.
                    [
                            @foreach($contestant as $key => $value)
                        {
                            'fillStyle': @if($key%2) '#FDFD96' @else '#C1E1C1' @endif,
                            'id': '{{ $value->id }}', 'text': '{{ $value->code_name }} {{ $value->slot_no }} '
                        },
                        @endforeach
                    ],
                'animation': { // Specify the animation to use.
                    'type': 'spinToStop',
                    'duration': 10, // Duration in seconds.
                    'spins': 8, // Number of complete spins.
                    'callbackFinished': alertPrize
                },
                'textAlignment'   : 'outer',
                'textFontFamily'  : 'courier',
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
                theWheel.animation.spins = 18;

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
                document.getElementById("winner-label").innerHTML += indicatedSegment.text;
                var myModal = new bootstrap.Modal(
                    document.getElementById('winnerModal'), {
                        keyboard: false
                    })
                myModal.show();
                @this.
                setDrawed(indicatedSegment.id);
            }

            function reloadPage() {
                location.reload();
            }
        </script>
    @endpush
</div>
