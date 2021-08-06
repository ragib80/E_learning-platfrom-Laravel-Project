@foreach($student as $student)

   {{ $student->fullname }}

@endforeach

{!! $students->links() !!}
