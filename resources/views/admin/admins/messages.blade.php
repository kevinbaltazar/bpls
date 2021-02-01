<x-admin-layout>
    <div class="mx-20">
        <div class="flex flex-col">
            <div class="-my-2 overflow-x-auto sm:-mx-6 lg:-mx-8">
              <div class="py-2 align-middle inline-block min-w-full sm:px-6 lg:px-8">
                <div class="shadow overflow-hidden border-b border-gray-200 sm:rounded-lg">
                  <table class="min-w-full divide-y divide-gray-200">
                    <thead class="bg-gray-50">
                      <tr>
                        <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                          Name
                        </th>
                        <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                          Email
                        </th>
                        <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                          Contact Number
                        </th>
                        <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                          Message
                        </th>
                        <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">

                        </th>
                      </tr>
                    </thead>
                    <tbody class="bg-white divide-y divide-gray-200">
                      @foreach ($messages as $message) 
                      <tr>
                        <td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-900">
                          {{$message->full_name}}
                        </td>
                        <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">
                          {{$message->email}}
                        </td>
                        <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">
                          {{$message->contact_number}}
                        </td>
                        <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500 w-48 fixed overflow-hidden overflow-ellipsis">
                          {{$message->message}}
                        </td>
                        <td class="px-6 py-4 whitespace-nowrap text-right text-sm font-medium">
                          
                        <x-modal 
                        variant="info" 
                        title="Message" 
                        with-icon="false"
                        >

                        <p class="w-64 h-auto bg-red-50">{{$message->message}}</p>
                        {{-- <textarea class="w-100 border-none" name="" id="" cols="60" rows="10" disabled>lorem100</textarea> --}}

                          <x-slot name="trigger">
                            <button class="text-indigo-500 bg-none" @click="on = true">
                              Show
                            </button>
                          </x-slot>

                        </x-modal>

                        </td>
                      </tr>
                      @endforeach
          
                      <!-- More items... -->
                    </tbody>
                  </table>
                </div>
              </div>
            </div>
          </div>
          
    </div>
</x-admin-layout>