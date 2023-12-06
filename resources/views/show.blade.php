@extends('layouts.app')

@section('content')
    <div class="container">
        <div id="CompaniesTable"></div>
    </div>
@endsection

@section('script')
    <script>
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
    </script>
    <script type="text/javascript">
        $(document).ready(function() {
            $('#CompaniesTable').jtable({
                title: 'Table of People',
                actions: {
                    listAction: '{{ route('listing') }}',
                    createAction: '{{ route('insert') }}',
                    updateAction: '{{ route('update') }}',
                    deleteAction: '{{ route('delete') }}'
                },
                fields: {
                    id: {
                        key: true,
                        list: false
                    },
                    comp_name: {
                        title: 'Company Name',
                        width: '40%'
                    },
                    created_at: {
                        title: 'Create date',
                        width: '30%',
                        type: 'date',
                        create: false,
                        edit: false
                    },
                    updated_at: {
                        title: 'Update date',
                        width: '30%',
                        type: 'date',
                        create: false,
                        edit: false
                    }
                }
            });
            $('#CompaniesTable').jtable('load');
        });
    </script>
@endsection
