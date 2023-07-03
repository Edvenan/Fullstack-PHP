<div>

    <x-slot name="header">
        <h2 class="font-semibold text-xl text-center text-gray-800 leading-tight">
            {{ __('Teams Management') }}
        </h2>
    </x-slot>


    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">


            <div class="px-12 py-4">
                <x-input class="w-full" placeholder="Search team..." type="text" wire:model="search">
                </x-input>
            </div>

            @if ($teams->count())
                
                <x-card-list-section>
                    
                    @foreach ($teams as $team)
                        <!-- Card Item -->
                        <div
                            class="my-8 rounded shadow-lg shadow-gray-200 dark:shadow-gray-900 bg-white dark:bg-gray-800 duration-300 hover:-translate-y-1"
                            >
                            <!-- Clickable Area -->
                            <a _href="link" class="cursor-pointer">
                                <figure class="h-full flex flex-col">
                                    <!-- Image -->
                                    <img
                                        src="{{$team->emblem_photo}}"
                                        class="rounded-t mx-auto h-40 " />

                                    <figcaption class="p-4 mt-auto">
                                        <!-- Name -->
                                        <p
                                            class="h-16 text-lg mb-4 font-bold leading-relaxed text-gray-800 dark:text-gray-300">
                                            {{$team->name}}
                                        </p>
                                        <!-- Foundation Year -->
                                        <p class="float-right">
                                            {{$team->foundation_year}}
                                        </p>

                                        <!-- Stadium -->
                                        <small
                                            class="leading-5 mt-4 text-gray-500 dark:text-gray-400"
                                            >
                                            {{$team->stadium}}
                                        </small>
                                        <p>
                                            <small class="float-left ">
                                                Position
                                            </small> 
                                            <span class="float-right font-bold">
                                                {{$team->position()}}
                                            </span>
                                        </p>
                                    </figcaption>
                                </figure>
                            </a>
                        </div>
                    @endforeach

                </x-card-list-section>
    
            @else
                <div class="px-12 py-4">
                    <x-alert-message type="danger">
                        <x-slot name="title">
                            The IT Academy League:
                        </x-slot> 
                            No teams found!
                    </x-alert-message>
                </div>
            @endif 


    </div>

</div>            
        