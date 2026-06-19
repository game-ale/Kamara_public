<?php

use function Laravel\Folio\name;

name('admissions.confirmation');

?>

<x-layouts.app title="Application Confirmation - Kamara School">
    <livewire:website.admissions.application-confirmation :reference="$reference" />
</x-layouts.app>
