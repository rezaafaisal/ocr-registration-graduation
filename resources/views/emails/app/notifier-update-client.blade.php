<x-mail::message>
# Application Updated Notification!

Dear client.  
The {{ $name }} v{{ $num_last }} was update to v{{ $num }}.  
You can see **[here]({{ $url }})**.

## Changes
{{ $changes }}

Regards,  
{{ $vendor }}.

---

the message was send by **bot**, don't reply.
</x-mail::message>
