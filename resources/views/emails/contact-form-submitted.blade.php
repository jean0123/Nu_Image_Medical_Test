@component('mail::message')
# New Contact Form Submission

**Name:** {{ $contact->name }}

**Email:** {{ $contact->email }}

**Phone:** {{ $contact->phone ?? 'Not provided' }}

**Question/Comments:**
{{ $contact->question_comments ?? 'Not provided' }}

Thanks,<br>
{{ config('app.name') }}
@endcomponent
