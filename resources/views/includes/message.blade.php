      @if(session('message'))
            <div class="max-w-lg overflow-hidden rounded-lg bg-green-100 text-green-700 shadow-md shadow-green-500/20">
                <div class="flex">
                    <div class="space-y-1 p-4">
                        <p class="font-bold capitalize">
                            {{ session('message') }}
                        </p>                       
                    </div>
                </div>
            </div>    
        @endif
        <br>