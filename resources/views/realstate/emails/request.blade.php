Name: {{ $data['name'] }} <br>
Phone: {{ $data['phone'] }} <br>
@if(isset($data['email']))
Email: {{ $data['email'] }} <br>
@endif
@if(isset($data['reference']))
Reference: {{ $data['reference'] }} <br>
@endif