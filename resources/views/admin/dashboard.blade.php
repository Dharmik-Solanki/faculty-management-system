<x-app-layout>
    <link rel="stylesheet" href="https://cdn.datatables.net/1.13.6/css/jquery.dataTables.min.css">
    <div style="padding-top: 48px; padding-bottom: 48px; font-family: system-ui, -apple-system, sans-serif;">
        <div style="max-width: 1280px; margin-left: auto; margin-right: auto; padding-left: 24px; padding-right: 24px;">
            <div style="background-color: #ffffff; box-shadow: 0 1px 2px 0 rgba(0, 0, 0, 0.05); border-radius: 8px; padding: 24px;">
                <table id="facultyTable" class="display" style="width:100%">
                    <thead>
                        <tr>
                            <th style="text-align: left;">Photo</th>
                            <th style="text-align: left;">Name</th>
                            <th style="text-align: left;">Email</th>
                            <th style="text-align: left;">Status</th>
                            <th style="text-align: left;">Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($faculties as $faculty)
                        <tr>
                            <td><img src="{{ asset('storage/' . $faculty->profile_photo) }}" width="40" style="border-radius: 50%; object-fit: cover; height: 40px;"></td>
                            <td>{{ $faculty->first_name }} {{ $faculty->last_name }}</td>
                            <td>{{ $faculty->user->email }}</td>
                            <td>
                                <form action="{{ route('admin.user.status', $faculty->user->id) }}" method="POST" style="margin: 0;">
                                    @csrf @method('PATCH')
                                    <button type="submit" style="padding: 4px 12px; border-radius: 4px; color: #ffffff; font-size: 12px; font-weight: bold; border: none; cursor: pointer; background-color: {{ $faculty->user->status == 'active' ? '#16a34a' : '#dc2626' }};">
                                        {{ ucfirst($faculty->user->status) }}
                                    </button>
                                </form>
                            </td>
                            <td>
                                <div style="display: flex; align-items: center; gap: 8px;">
                                    <a href="{{ route('admin.faculty.show', $faculty->id) }}"
                                       style="background-color: #2563eb; color: #ffffff; padding: 8px; border-radius: 4px; box-shadow: 0 1px 2px 0 rgba(0,0,0,0.05); display: inline-flex; text-decoration: none; transition: background-color 0.2s;"
                                       title="View"
                                       onmouseover="this.style.backgroundColor='#1e40af'"
                                       onmouseout="this.style.backgroundColor='#2563eb'">
                                        <svg style="width: 20px; height: 20px;" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z" />
                                            <path stroke-linecap="round" stroke-linejoin="round" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z" />
                                        </svg>
                                    </a>
                                    <form action="{{ route('admin.user.delete', $faculty->user->id) }}" method="POST" onsubmit="return confirm('Are you sure you want to delete this record?')" style="margin: 0;">
                                        @csrf @method('DELETE')
                                        <button type="submit"
                                                style="background-color: #ef4444; color: #ffffff; padding: 8px; border-radius: 4px; border: none; box-shadow: 0 1px 2px 0 rgba(0,0,0,0.05); display: inline-flex; cursor: pointer; transition: background-color 0.2s;"
                                                title="Delete"
                                                onmouseover="this.style.backgroundColor='#b91c1c'"
                                                onmouseout="this.style.backgroundColor='#ef4444'">
                                            <svg style="width: 20px; height: 20px;" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                                                <path stroke-linecap="round" stroke-linejoin="round" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16" />
                                            </svg>
                                        </button>
                                    </form>
                                </div>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdn.datatables.net/1.13.6/js/jquery.dataTables.min.js"></script>
    <script> $(document).ready(function() { $('#facultyTable').DataTable(); }); </script>
</x-app-layout>
