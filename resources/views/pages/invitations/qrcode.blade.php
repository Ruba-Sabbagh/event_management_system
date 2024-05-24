<html>
    <x-phead></x-phead>
    <body>

        <div style="border: 1px solid;    text-align: center;        ">
            <img  src="/images/uploads/events/{{ $invitation->event->image1 }}" />


                <p style="text-align: center"><h1>{{$invitation->nickname1->name .": ". $invitation->name}} </h1>
                </br>تم تأكيد دعوتك لحضور {{ $invitation->event->title }}</p>


                <a href="" id="container" >{!! $qrcode['simple'] !!}</a><br/>
                <button id="download" class="mt-2 btn btn-info text-light" onclick="downloadSVG()">Download SVG</button>

        </div>
    </body>
    <script>

        function downloadSVG() {
          const svg = document.getElementById('container').innerHTML;
          const blob = new Blob([svg.toString()]);
          const element = document.createElement("a");
          element.download = "w3c.svg";
          element.href = window.URL.createObjectURL(blob);
          element.click();
          element.remove();
        }
        </script>
</html>
