<x-layout>
    <x-slot:heading>
        Create Job
    </x-slot:heading>

    <p>

    <form method="POST" action="/jobs">
        @csrf
        <div class="space-y-12">
            <div class="border-b border-gray-900/10 pb-12">
                <h2 class="text-base font-semibold leading-7 text-gray-900">Create a new Job</h2>
                <p class="mt-1 text-sm leading-6 text-gray-600">
                    we just need handful details from you</p>

                <div class="mt-10 grid grid-cols-1 gap-x-6 gap-y-8 sm:grid-cols-6">
                    <x-form-field>

                        <x-form-label for="title">
                            Hassan
                        </x-form-label>

                        <div class="mt-2">

                            <x-form-input name="title" id="title" placeholder="Ceo" />
                            <x-form-error name="title" />

                        </div>
                    </x-form-field>

                    <x-form-field>
                        
                        <x-form-label for="salary">
                            Salary
                        </x-form-label>

                        <div class="mt-2">

                            <x-form-input name="salary" id="salary" placeholder="$50,000" />
                            <x-form-error name="salary" />

                        </div>
                    </x-form-field>



                </div>
            </div>



        </div>

        <div class="mt-6 flex items-center justify-end gap-x-6">
            <button type="button" class="text-sm font-semibold leading-6 text-gray-900">Cancel</button>
            <x-form-button>
                Save
            </x-form-button>
        </div>
    </form>

    </p>
</x-layout>
