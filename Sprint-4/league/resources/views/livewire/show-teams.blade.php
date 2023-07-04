<div>

    <x-slot name="header">
        <h2 class="font-semibold text-xl text-center text-gray-800 leading-tight">
            {{ __('Teams Management') }}
        </h2>
    </x-slot>


    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">

            {{-- search bar & Create Team button --}}
            <div class=" py-4 flex items-center">
                <x-input class="flex-1 mr-4" placeholder="Search teams by name, year, stadium..." type="text" wire:model="search">
                </x-input>
                @livewire('create-team')
            </div>

            @if ($teams->count())
                {{-- card grid with teams found --}}
                <x-card-list-section>
                    
                    @foreach ($teams as $team)
                        <!-- Card Item -->
                        <div
                            class="my-2 rounded shadow-lg shadow-gray-200 dark:shadow-gray-900 bg-white dark:bg-gray-800 duration-300 hover:-translate-y-2"
                            >
                            <!-- Clickable Area -->
                            <a _href="link" class="cursor-pointer">
                                <figure class="pt-4 pb-0 flex flex-col">
                                    <!-- Image -->
                                    <img
                                        src="{{$team->emblem_photo}}"
                                        class="rounded-t mx-auto h-32 " />

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
                                        <small
                                            class="leading-5 mt-4 text-gray-500 dark:text-gray-400"
                                            >
                                            Foundation Year:
                                        </small>
                                        <!-- Stadium -->
                                        <p>
                                            <small
                                                class="leading-5 mt-4 text-gray-500 dark:text-gray-400"
                                                >
                                                Stadium:
                                            </small><br>
                                            <small
                                                class=" text-gray-500 dark:text-gray-400 float-right"
                                                >
                                                {{$team->stadium}}
                                            </small>
                                        </p><br>
                                        <p class="float-right font-bold">
                                                {{$team->position()}}
                                        </p>
                                        <small class="leading-5 float-left ">
                                            Position:
                                        </small>
                                            
                                    </figcaption>
                                </figure>
                            </a>
                        </div>
                    @endforeach

                </x-card-list-section>
    
            @else
                {{-- no teams found --}}
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
        