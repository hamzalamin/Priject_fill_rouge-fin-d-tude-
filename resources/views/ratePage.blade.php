@include('navbar')
<style>
    .star {
		font-size: 5vh;
		cursor: pointer;
		}
		
		.one {
		color: rgb(248, 73, 73);
		}
		
		.two {
		color: rgb(242, 248, 74);
		}
		
		.three {
		
		color: rgb(149, 228, 12);
		
		}
		
		.four {
		color: rgb(105, 187, 12);
		}
		
		.five {
		color: rgb(24, 159, 14);
		}
		
		
		.disabled{
		
		padding: 8px 20px ;
		/* margin: 4px; */
		
		}
		
</style>
<section class="ticket">
    <h2>TICKET REF:  {{ $reservation->id }}</h2>
    <p>Thank you for using our service!</p>
    <p>total price : {{ $reservation->total_price }} DH</p>
    {{-- <p>Date: {{ $tic->updated_at }}</p> --}}
    <p>Please keep this ticket safe.</p>
    <div class="info-row">

        @if ($rateOne <= 0)
        <form action="{{ route('rateTicket') }}" method="post">
            @csrf
            <div class="" id="f_star">
                 <input class="form-control" value="{{ $request->user_id }}" name="user_id" placeholder="" type="hidden"> 
                 {{-- {{ dd($reservation->driver_id); }} --}}
                <input class="form-control" value="{{ $reservation->id }}" name="ticket_id" placeholder="" type="hidden"> 
                <span onclick="gfg(1)" class="star">★</span>
                <span onclick="gfg(2)" class="star">★</span>
                <span onclick="gfg(3)" class="star">★</span>
                <span onclick="gfg(4)" class="star">★</span>
                <span onclick="gfg(5)" class="star">★</span>
            <div  id="output"></div>
            <button type="submit"  class="botonaRatin">done</button>
            </div> 
        </form>
        @else
        <p style="color:red;">you allready rate this ticket</p>
        @endif

        
    </div>
</section>
<script>
    /*
    This is a multi-line comment.
    It spans multiple lines and will be ignored by the JavaScript interpreter.
    */
    
    let stars = document.getElementsByClassName("star");
    let output = document.getElementById("output");
    
    function gfg(n) {
        remove();
        for (let i = 0; i < n; i++) {
            if (n == 1) cls = "one";
            else if (n == 2) cls = "two";
            else if (n == 3) cls = "three";
            else if (n == 4) cls = "four";
            else if (n == 5) cls = "five";
            stars[i].className = "star " + cls;
        }
        output.innerHTML = `<input type="text" id="num" name="rating" value="${n}" style="display: none">`;
        console.log(n);
    }
    
    // To remove the pre-applied styling
    function remove() {
        let i = 0;
        while (i < 5) {
            stars[i].className = "star";
            i++;
        }
    }
    
    </script>

{{-- @include('footer') --}}


<script src="{{ asset('jss/main1.js') }}"></script>