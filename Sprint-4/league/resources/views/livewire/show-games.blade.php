<div>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-center text-gray-800 leading-tight">
            {{ __('Games Management') }}
        </h2>
    </x-slot>
    
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">


        <div class="px-12 py-4">
            <x-input class="w-full" placeholder="Search games by team..." type="text" wire:model="search">
            </x-input>
        </div>

        @if ($games->count())

            <div class="px-6 py-4">
                <input type="text" wire:model="search">
            </div>
            
            <x-table>
                <table class="min-w-full leading-normal">
                    <thead> {{-- Table header --}}
                        <tr>
                            <th {{-- Table header: Team 1--}}
                                class="cursor-pointer px-5 py-3 border-b-2 border-gray-200 bg-gray-100 text-center text-xs font-semibold text-gray-600 uppercase tracking-wider"
                                wire:click="order('team_1.name')">
                                Local

                                {{-- Sort icons --}}
                                @if ($sort == 'team_1.name')
                                    @if (! $direction)
                                        <i class="fas fa-sort-alpha-up-alt float-right "></i>
                                    @else
                                        <i class="fas fa-sort-alpha-down-alt float-right "></i>
                                    @endif
                                @else
                                    <i class="fas fa-sort float-right "></i>
                                @endif

                            </th>
                            <th {{-- Table header: Score --}}
                                class=" px-5 py-3 border-b-2 border-gray-200 bg-gray-100 text-center text-xs font-semibold text-gray-600 uppercase tracking-wider">
                                <p></p>
                            </th>   
                            <th {{-- Table header: Team 2 --}}
                                class="cursor-pointer px-5 py-3 border-b-2 border-gray-200 bg-gray-100 text-center text-xs font-semibold text-gray-600 uppercase tracking-wider"
                                wire:click="order('team_2.name')">
                                Visitor

                                {{-- Sort icons --}}
                                @if ($sort == 'team_2.name')
                                    @if (! $direction)
                                        <i class="fas fa-sort-alpha-up-alt float-right "></i>
                                    @else
                                        <i class="fas fa-sort-alpha-down-alt float-right "></i>
                                    @endif
                                @else
                                    <i class="fas fa-sort float-right "></i>
                                @endif

                            </th>
                            <th {{-- Table header: Date --}}
                                class="cursor-pointer px-5 py-3 border-b-2 border-gray-200 bg-gray-100 text-center text-xs font-semibold text-gray-600 uppercase tracking-wider"
                                wire:click="order('date')">
                                Date
                                
                                {{-- Sort icons --}}
                                @if ($sort == 'date')
                                    @if (! $direction)
                                        <i class="fas fa-sort-alpha-up-alt float-right "></i>
                                    @else
                                        <i class="fas fa-sort-alpha-down-alt float-right "></i>
                                    @endif
                                @else
                                    <i class="fas fa-sort float-right "></i>
                                @endif

                            </th>
                            <th {{-- Table header: Time --}}
                                class="cursor-pointer px-5 py-3 border-b-2 border-gray-200 bg-gray-100 text-center text-xs font-semibold text-gray-600 uppercase tracking-wider hidden lg:table-cell"
                                wire:click="order('time')">
                                Time
                                
                                {{-- Sort icons --}}
                                @if ($sort == 'time')
                                    @if (! $direction )
                                        <i class="fas fa-sort-alpha-up-alt float-right "></i>
                                    @else
                                        <i class="fas fa-sort-alpha-down-alt float-right "></i>
                                    @endif
                                @else
                                    <i class="fas fa-sort float-right "></i>
                                @endif

                            </th>
                            <th {{-- Table header: Stadium --}}
                                class="cursor-pointer px-5 py-3 border-b-2 border-gray-200 bg-gray-100 text-center text-xs font-semibold text-gray-600 uppercase tracking-wider hidden lg:table-cell"
                                wire:click="order('team_1.stadium')">
                                Stadium

                                {{-- Sort icons --}}
                                @if ($sort == 'team_1.stadium')
                                    @if (! $direction)
                                        <i class="fas fa-sort-alpha-up-alt float-right "></i>
                                    @else
                                        <i class="fas fa-sort-alpha-down-alt float-right "></i>
                                    @endif
                                @else
                                    <i class="fas fa-sort float-right "></i>
                                @endif

                            </th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($games as $game)

                            <tr>
                                <td class="px-5 py-5 border-b border-gray-200 bg-white text-sm">
                                    <div class="flex items-center">
                                        <div class="flex-shrink-0 w-10 h-10">
                                            <img class="w-full h-full "
                                                
                                                src="{{$game->team_1->emblem_photo}}"
                                                alt="" />
                                        </div>
                                        <div class="ml-3">
                                            <p class="text-gray-900 whitespace-no-wrap">
                                                {{$game->team_1->name}}
                                            </p>
                                        </div>
                                        
                                    </div>
                                </td>
                                <td class="px-5 py-5 border-b border-gray-200 bg-white text-sm">
                                    <div class="ml-3">
                                        <p class="text-gray-900 whitespace-no-wrap">
                                            {{$game->score_team_1}}
                                            &emsp;-&emsp;
                                            {{$game->score_team_2}}
                                        </p>
                                    </div>
                                </td>
                                <td class="px-5 py-5 border-b border-gray-200 bg-white text-sm">
                                    <div class="flex items-center">
                                        
                                        <div class="flex-shrink-0 w-10 h-10">
                                            <img class="w-full h-full "
                                                
                                                src="{{$game->team_2->emblem_photo}}"
                                                alt="" />
                                        </div>
                                        <div class="ml-3">
                                            <p class="text-gray-900 whitespace-no-wrap">
                                                {{$game->team_2->name}}
                                            </p>
                                        </div>
                                    </div>
                                </td>
                                <td class="px-5 py-5 border-b border-gray-200 bg-white text-sm">
                                    <p class="text-gray-900 whitespace-no-wrap text-center">
                                        {{$game->date}}
                                    </p>
                                </td>
                                <td class="px-5 py-5 border-b border-gray-200 bg-white text-sm hidden lg:table-cell">
                                    <p class="text-gray-900 whitespace-no-wrap text-center">
                                        {{$game->time}}
                                    </p>
                                </td>
                                <td class="px-5 py-5 border-b border-gray-200 bg-white text-sm hidden lg:table-cell">
                                    <p class="text-gray-900 whitespace-no-wrap text-center">
                                        {{$game->team_1->stadium}}
                                    </p>
                                </td>
                            </tr>
                        
                        @endforeach
                    </tbody>
                </table>
            </x-table>

        @else

            <div class="px-12">
                <x-alert-message type="danger">
                    <x-slot name="title">
                        The IT Academy League:
                    </x-slot> 
                        No games found!
                </x-alert-message>
            </div>

        @endif

    </div>

</div>
