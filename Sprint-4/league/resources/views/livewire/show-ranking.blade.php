<div>

    <x-slot name="header">
        <h2 class="font-semibold text-center text-xl text-gray-800 leading-tight">
            {{ __('The IT Academy League Ranking') }}
        </h2>
    </x-slot>

    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">

        @if ($teams->count())

            <x-table>
                
                <table class="min-w-full leading-normal">
                    <thead> {{-- Table header --}}
                        <tr>
                            <th {{-- Table header: Rank --}}
                                class="cursor-pointer px-5 py-3  border-b-2 border-gray-200 bg-gray-100 text-center text-xs font-semibold text-gray-600 uppercase tracking-wider"
                                wire:click="order('points')">
                                Rank

                                {{-- Sort icons --}}
                                @if ($sort == 'points')
                                    @if ($direction == 'asc')
                                        <i class=" fas fa-sort-alpha-down-alt float-right "></i>
                                    @else
                                        <i class=" fas fa-sort-alpha-up-alt float-right "></i>
                                    @endif
                                @else
                                    <i class="fas fa-sort float-right sm:float mt-1"></i>
                                @endif
                            
                            </th>
                            <th {{-- Table header: Team --}}
                                class="cursor-pointer px-5 py-3 border-b-2 border-gray-200 bg-gray-100 text-center text-xs font-semibold text-gray-600 uppercase tracking-wider"
                                wire:click="order('name')">
                                Team

                                {{-- Sort icons --}}
                                @if ($sort == 'name')
                                    @if ($direction == 'asc')
                                        <i class="fas fa-sort-alpha-up-alt float-right "></i>
                                    @else
                                        <i class="fas fa-sort-alpha-down-alt float-right "></i>
                                    @endif
                                @else
                                    <i class="fas fa-sort float-right "></i>
                                @endif

                            </th>
                            <th {{-- Table header: Num Games --}}
                                class="cursor-pointer px-5 py-3 border-b-2 border-gray-200 bg-gray-100 text-center text-xs font-semibold text-gray-600 uppercase tracking-wider"
                                wire:click="order('num_games')">
                                Matches
                                
                                {{-- Sort icons --}}
                                @if ($sort == 'num_games')
                                    @if ($direction == 'asc')
                                        <i class="fas fa-sort-alpha-up-alt float-right "></i>
                                    @else
                                        <i class="fas fa-sort-alpha-down-alt float-right "></i>
                                    @endif
                                @else
                                    <i class="fas fa-sort float-right "></i>
                                @endif

                            </th>
                            <th {{-- Table header: Games Won --}}
                                class="cursor-pointer px-5 py-3 border-b-2 border-gray-200 bg-gray-100 text-center text-xs font-semibold text-gray-600 uppercase tracking-wider hidden lg:table-cell"
                                wire:click="order('won')">
                                Won
                                
                                {{-- Sort icons --}}
                                @if ($sort == 'won')
                                    @if ($direction == 'asc')
                                        <i class="fas fa-sort-alpha-up-alt float-right "></i>
                                    @else
                                        <i class="fas fa-sort-alpha-down-alt float-right "></i>
                                    @endif
                                @else
                                    <i class="fas fa-sort float-right "></i>
                                @endif

                            </th>
                            <th {{-- Table header: Games Draw --}}
                                class="cursor-pointer px-5 py-3 border-b-2 border-gray-200 bg-gray-100 text-center text-xs font-semibold text-gray-600 uppercase tracking-wider hidden lg:table-cell"
                                wire:click="order('draw')">
                                Draw

                                {{-- Sort icons --}}
                                @if ($sort == 'draw')
                                    @if ($direction == 'asc')
                                        <i class="fas fa-sort-alpha-up-alt float-right "></i>
                                    @else
                                        <i class="fas fa-sort-alpha-down-alt float-right "></i>
                                    @endif
                                @else
                                    <i class="fas fa-sort float-right "></i>
                                @endif

                            </th>
                            <th {{-- Table header: Games Lost --}}
                                class="cursor-pointer px-5 py-3 border-b-2 border-gray-200 bg-gray-100 text-center text-xs font-semibold text-gray-600 uppercase tracking-wider hidden lg:table-cell"
                                wire:click="order('lost')">
                                Lost

                                {{-- Sort icons --}}
                                @if ($sort == 'lost')
                                    @if ($direction == 'asc')
                                        <i class="fas fa-sort-alpha-up-alt float-right "></i>
                                    @else
                                        <i class="fas fa-sort-alpha-down-alt float-right "></i>
                                    @endif
                                @else
                                    <i class="fas fa-sort float-right "></i>
                                @endif

                            </th>
                            <th {{-- Table header: Goals --}}
                                class="cursor-pointer px-5 py-3 border-b-2 border-gray-200 bg-gray-100 text-center text-xs font-semibold text-gray-600 uppercase tracking-wider hidden lg:table-cell"
                                wire:click="order('goals')">
                                Goals

                                {{-- Sort icons --}}
                                @if ($sort == 'goals')
                                    @if ($direction == 'asc')
                                        <i class="fas fa-sort-alpha-up-alt float-right "></i>
                                    @else
                                        <i class="fas fa-sort-alpha-down-alt float-right "></i>
                                    @endif
                                @else
                                    <i class="fas fa-sort float-right "></i>
                                @endif

                            </th>
                            <th {{-- Table header: Goals Against --}}
                                class="cursor-pointer px-5 py-3 border-b-2 border-gray-200 bg-gray-100 text-center text-xs font-semibold text-gray-600 uppercase tracking-wider hidden lg:table-cell"
                                wire:click="order('against')">
                                Against

                                {{-- Sort icons --}}
                                @if ($sort == 'against')
                                    @if ($direction == 'asc')
                                        <i class="fas fa-sort-alpha-up-alt float-right "></i>
                                    @else
                                        <i class="fas fa-sort-alpha-down-alt float-right "></i>
                                    @endif
                                @else
                                    <i class="fas fa-sort float-right "></i>
                                @endif

                            </th>
                            <th {{-- Table header: Goal Average --}}
                                class="cursor-pointer px-5 py-3 border-b-2 border-gray-200 bg-gray-100 text-center text-xs font-semibold text-gray-600 uppercase tracking-wider hidden md:table-cell"
                                wire:click="order('average')">
                                +/-.

                                {{-- Sort icons --}}
                                @if ($sort == 'average')
                                    @if ($direction == 'asc')
                                        <i class="fas fa-sort-alpha-up-alt float-right "></i>
                                    @else
                                        <i class="fas fa-sort-alpha-down-alt float-right "></i>
                                    @endif
                                @else
                                    <i class="fas fa-sort float-right "></i>
                                @endif

                            </th>
                            <th {{-- Table header: Points --}}
                                class="cursor-pointer px-5 py-3 border-b-2 border-gray-200 bg-gray-100 text-center text-xs font-semibold text-gray-600 uppercase tracking-wider"
                                wire:click="order('points')">
                                Pts.
                            </th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($teams as $pos=>$team)

                            <tr>
                                <td class="px-5 py-5 border-b text-center border-gray-200 bg-white text-sm">
                                    <p class="text-gray-900  whitespace-no-wrap">
                                        {{$team->position()}}
                                    </p>
                                </td>
                                <td class="px-5 py-5 border-b border-gray-200 bg-white text-sm">
                                    <div class="flex items-center">
                                        <div class="flex-shrink-0 w-10 h-10">
                                            <img class="w-full h-full "
                                                
                                                src="{{$team->emblem_photo}}"
                                                alt="" />
                                        </div>
                                        <div class="ml-3">
                                            <p class="text-gray-900 whitespace-no-wrap">
                                                {{$team->name}}
                                            </p>
                                        </div>
                                    </div>
                                </td>
                                <td class="px-5 py-5 border-b border-gray-200 bg-white text-sm">
                                    <p class="text-gray-900 whitespace-no-wrap text-center">
                                        {{$team->num_games}}
                                    </p>
                                </td>
                                <td class="px-5 py-5 border-b border-gray-200 bg-white text-sm hidden lg:table-cell">
                                    <p class="text-gray-900 whitespace-no-wrap text-center">
                                        {{$team->won}}
                                    </p>
                                </td>
                                <td class="px-5 py-5 border-b border-gray-200 bg-white text-sm hidden lg:table-cell">
                                    <p class="text-gray-900 whitespace-no-wrap text-center">
                                        {{$team->draw}}
                                    </p>
                                </td>
                                <td class="px-5 py-5 border-b border-gray-200 bg-white text-sm hidden lg:table-cell">
                                    <p class="text-gray-900 whitespace-no-wrap text-center">
                                        {{$team->lost}}
                                    </p>
                                </td>
                                <td class="px-5 py-5 border-b border-gray-200 bg-white text-sm hidden lg:table-cell">
                                    <p class="text-gray-900 whitespace-no-wrap text-center">
                                        {{$team->goals}}
                                    </p>
                                </td>
                                <td class="px-5 py-5 border-b border-gray-200 bg-white text-sm hidden lg:table-cell">
                                    <p class="text-gray-900 whitespace-no-wrap text-center">
                                        {{$team->against}}
                                    </p>
                                </td>
                                <td class="px-5 py-5 border-b border-gray-200 bg-white text-sm hidden md:table-cell">
                                    <p class="text-gray-900 whitespace-no-wrap text-center">
                                        {{$team->average}}
                                    </p>
                                </td>
                                <td class="px-5 py-5 border-b border-gray-200 bg-white text-sm">
                                    <p class="text-gray-900 whitespace-no-wrap text-center">
                                        {{$team->points}}
                                    </p>
                                </td>
                            </tr>
                        
                        @endforeach
                    </tbody>
                </table>

            </x-table>

        @else
                    
            <x-alert-message type="danger">
                <x-slot name="title">
                    The IT Academy League:
                </x-slot> 
                    No teams found!
            </x-alert-message>
            
        @endif
        
    </div>

</div>