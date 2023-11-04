<x-mail::message>
# Silahkan login pada portal pendaftaran wisuda

NIM: {{ $student->nim }}  
Password: {{ $student->password }}

Silahkan login **[di sini]({{ $url }})**.

---

the message was send by **bot**, don't reply.
</x-mail::message>
