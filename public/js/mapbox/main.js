const apikey='pk.eyJ1IjoiZWxpLXNoYW1vdXQiLCJhIjoiY2t0bzFydjEzMDhmcDJybDRqOWQ2NW4xOCJ9.BOhDGTM6J1cBUPFfH5RvjQ';

const mymap = L.map('map').setView([35.06060431462717, 36.70135505527458], 15);
L.tileLayer('https://api.mapbox.com/styles/v1/{id}/tiles/{z}/{x}/{y}?access_token={accessToken}', {
    maxZoom: 18,
    id: 'mapbox/streets-v11',
    tileSize: 512,
    zoomOffset: -1,
    accessToken: apikey
}).addTo(mymap);


let center_markup=[
    {
        id:0,
        name:'Hame',
        location:[35.060757209610486, 36.6946300311412],
        phone:[0000,1111]
    },
    {
        id:1,
        name:'Homs',
        location:[34.7156589007845, 36.70891799387697],
        phone:[1111,2222]
    },
    {
        id:2,
        name:'Aleppo',
        location:[36.214958357293305, 37.15578029192073],
        phone:[3333,4444]
    },
    {
        id:3,
        name:'Damascus',
        location:[33.52389757115254, 36.31758738269634],
        phone:[5555,6666]
    },
];


console.log(center_markup);

let contentBox='';
center_markup.forEach((ele)=>{
    // add marker center into map
    var marker=L.marker([ele.location[0],ele.location[1]]).addTo(mymap);
    var message=`
        <div style='text-align:center'>
            <h5 class='mb-0 pb-0'>TreeBox</h5>
            <span class='d-block text-muted'>${ele.name}</span>
            <img src='{{ asset('images/open-box-colored.svg') }}' alt='treebox logo' width='20' height='20'>
            <span class='d-block'>${ele.phone}</span>
        </div>
    `;
    marker.bindPopup(message).openPopup();

    // init content center
    contentBox+=`
    <div class="accordion-item">
      <h2 class="accordion-header" id="flush-headingOne" >
        <button class="accordion-button collapsed" id='fly-${ele.id}' type="button" data-bs-toggle="collapse" data-bs-target="#flush-map-${ele.id}" aria-expanded="false" aria-controls="flush-collapseOne">
            ${ele.name}
        </button>
      </h2>
      <div id="flush-map-${ele.id}" class="accordion-collapse collapse" aria-labelledby="flush-headingOne" data-bs-parent="#accordionFlushExample">
        <div class="accordion-body">
            <div class="row mb-1">
                <div class="col-12 col-lg-6">
                    <span class="font-size-16 fw-bold">Phone :</span> ${ele.phone[0]}
                </div>
                <div class="col-12 col-lg-6">
                    ${ele.phone[1]}
                </div>
            </div>
            <div class="row mb-1">
                <div class="col-12">
                    <span class="font-size-16 fw-bold">Disc :</span> ${ele.disc}
                </div>
            </div>
        </div>
      </div>
    </div>
    `;

    $(".accordion-map").html(contentBox);
});

center_markup.forEach((ele)=>{
    $("#fly-"+ele.id).bind('click',function(){
        mymap.flyTo([ele.location[0],ele.location[1]],15);
        marke.openPopup();
    });
});

mymap.flyTo([center_markup[center_markup.length-1].location[0],center_markup[center_markup.length-1].location[1]],15);