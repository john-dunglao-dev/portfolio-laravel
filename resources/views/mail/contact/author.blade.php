<x-mail::message>
# Message from your Portfolio Website

A new message has been received from your portfolio website contact form.

<x-mail::table>
| Field   | Details               |
|---------|-----------------------|
| Name    | {{ $contactData['name'] }}    |
| Email   | [{{ $contactData['email'] }}](mailto:{{ $contactData['email'] }})   |
| Subject | {{ $contactData['subject'] }} |
| Message | {{ $contactData['message'] }} |
</x-mail::table>

Thanks,<br>
Bot John Jr.
</x-mail::message>
