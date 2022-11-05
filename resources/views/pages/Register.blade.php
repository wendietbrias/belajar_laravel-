@extends("layout.index")

@section("container")

<div class="min-w-screen min-h-screen bg-gray-200 flex items-center justify-center">
    <div class="bg-white shadow-md shadow-slate-300 py-4 px-5 rounded-md">
           @if(count($errors) === 1) 
             <div class="mb-4 w-full bg-red-100 text-red-500 font-semibold py-2 px-3 rounded-md">
             @foreach ($errors as $error) 

             <p><?= $error ?></p>

             @endforeach
             </div>

            @endif
        <h2 class="text-2xl text-center font-bold">Register TokoSMK</h2>
        <form action="/register" method="POST" class="w-full mt-6">
            @csrf
               <div class="w-[420px] flex flex-col">
                <label class="text-md mb-1 text-slate-500">Name</label>
                <input name="name" type="text" class="outline-none mt-2 w-full bg-slate-100 py-2 px-3 rounded-md"/>
            </div>
            <div class="w-[420px] flex flex-col mt-3">
                <label class="text-md mb-1 text-slate-500">Email</label>
                <input name="email" type="email" class="outline-none mt-2 w-full bg-slate-100 py-2 px-3 rounded-md"/>
            </div>
             <div class="w-[420px] mt-3 flex flex-col">
                <label class="text-md mb-1 text-slate-500">Password</label>
                <input name="password" type="password" class="outline-none mt-2 w-full bg-slate-100 py-2 px-3 rounded-md"/>
            </div>
                  <div class="w-[420px] flex flex-col mt-3">
                <label class="text-md mb-1 text-slate-500">Confirm</label>
                <input name="confirm" type="password" class="outline-none mt-2 w-full bg-slate-100 py-2 px-3 rounded-md"/>
            </div>
            <button type="submit" class="mt-7 bg-blue-400 text-white font-semibold text-sm rounded-md w-full py-2">Register</button>
            <p class="text-slate-400 text-sm font-medium mt-3 text-center">
               Already have account? <a href="/register" class="text-slate-500">Login</a>
            </p>
        </form>
    </div>
</div>

@endsection