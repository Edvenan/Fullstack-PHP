<div>
    {{-- Create Game button --}}
    <x-danger-button class="shadow-lg" wire:click="$set('open', true)">
        Create Game
    </x-danger-button>

    <x-dialog-modal wire:model='open'>

        <x-slot name='title'>
            <p class="text-center">Create Game</p>
        </x-slot>

        <x-slot name='content'>
            <div class="flex flex-col justify-between">
                {{-- teams selection --}}
                <div class="flex">
                    <div class="mb-4 flex-1">
                        <x-label for='localId' value="Local Team:" />
                        <select class="ml-4 text-sm rounded-lg border-gray-300" id='localId' wire:model='localId'>
                            <option value="">Select local team</option>
                            @foreach($locals as $local)
                                <option value="{{$local->id}}"  data-select-icon="{{$local->emblem_photo}}">{{$local->name}}</option>
                            @endforeach
                        </select>
                        <x-input-error class="mt-1 ml-4 text-xs" for='localId'/>
                    </div>
                    <div class="mb-4 flex-1">
                        <x-label for='visitorId' value="Visitor Team:" />
                        <select class="ml-4 text-sm rounded-lg border-gray-300" id='visitorId' wire:model='visitorId'>
                            <option value="">Select visitor team</option>
                            @foreach($visitors as $visitor)
                                <option value="{{$visitor->id}}" data-select-icon="{{$visitor->emblem_photo}}">{{$visitor->name}}</option>
                            @endforeach
                        </select>
                        <x-input-error class="mt-1 ml-4 text-xs" for='visitorId'/>
                    </div>
                </div>
                
                <div class="flex">
                    {{-- Game Date --}}
                    <div class="mb-4 flex-1">
                        <x-label for='date' value="Game Date:" />
                        <x-input class="ml-4  text-sm" id="date" type="date" wire:model="date"/>
                        <x-input-error class="mt-1 ml-4 text-xs" for='date'/>
                    </div>
                    {{-- Game Time --}}
                    <div class="mb-4 flex-1">
                        <x-label for='time' value="Game Time:" />
                        <x-input class="ml-4  text-sm" id="time" type="time" wire:model="time"/>
                        <x-input-error class="mt-1 ml-4 text-xs" for='time'/>
                    </div>
                </div>
            </div>    
        </x-slot>

        <x-slot name='footer'>
            <x-secondary-button wire:click="$set('open', false)">
                Cancel
            </x-secondary-button>

            <x-danger-button class="ml-4" wire:click="save" wire:loading.remove wire:target="save">
                Create Game
            </x-danger-button>

            <x-danger-button class="ml-4" wire:loading wire:target="save">Saving...</x-danger-button>

        </x-slot>

    </x-dialog-modal>
</div>
