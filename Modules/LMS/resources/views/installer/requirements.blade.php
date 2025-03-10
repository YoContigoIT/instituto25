<table class="installment-table table">
    <tbody>
        @foreach ($requirements['requirements'] as $type => $requirement)
            @if ($type == 'php')
                <tr>
                    <td><strong>{{ ucfirst($type) }}</strong> ( {{ $phpSupportInfo['minimum'] }} required)</td>
                    <td>
                        <div class="vertion-and-stutas">
                            <span> {{ $phpSupportInfo['current'] }} </span>
                            <div class=" {{ $phpSupportInfo['supported'] ? 'check' : 'check red' }} ">
                                <svg xmlns="http://www.w3.org/2000/svg" width="8" height="6" viewBox="0 0 8 6">
                                    <path
                                        d="M6.75646 0.191292C6.8947 0.0672398 7.07867 -0.00134136 7.26954 1.98831e-05C7.46041 0.00138113 7.64325 0.0725785 7.77949 0.198588C7.91573 0.324598 7.9947 0.495564 7.99974 0.675411C8.00479 0.855259 7.93551 1.02992 7.80653 1.16254L3.89085 5.77827C3.82352 5.84663 3.74226 5.90148 3.65192 5.93956C3.56158 5.97764 3.46403 5.99815 3.36509 5.99988C3.26614 6.00161 3.16785 5.98451 3.07608 5.94961C2.98431 5.91471 2.90094 5.86273 2.83097 5.79677L0.234262 3.34923C0.161948 3.28572 0.103946 3.20913 0.063718 3.12403C0.0234896 3.03893 0.00185823 2.94707 0.000114546 2.85392C-0.00162914 2.76077 0.0165507 2.66824 0.053569 2.58186C0.0905874 2.49547 0.145686 2.417 0.215578 2.35112C0.28547 2.28525 0.368724 2.23331 0.460372 2.19842C0.552021 2.16353 0.650187 2.14639 0.749014 2.14804C0.847841 2.14968 0.945304 2.17007 1.03559 2.20799C1.12588 2.24591 1.20713 2.30057 1.27452 2.36873L3.32951 4.30475L6.73782 0.211642C6.74395 0.204521 6.74952 0.197726 6.75646 0.191292Z">
                                    </path>
                                </svg>
                            </div>
                        </div>
                    </td>
                </tr>
            @endif
            @foreach ($requirements['requirements'][$type] as $extention => $enabled)
                <tr>
                    <td> {{ $extention }}</td>
                    <td>
                        <div class="vertion-and-stutas">
                            <div class=" {{ $enabled ? 'check' : 'check red' }}">
                                <svg xmlns="http://www.w3.org/2000/svg" width="8" height="6" viewBox="0 0 8 6">
                                    <path
                                        d="M6.75646 0.191292C6.8947 0.0672398 7.07867 -0.00134136 7.26954 1.98831e-05C7.46041 0.00138113 7.64325 0.0725785 7.77949 0.198588C7.91573 0.324598 7.9947 0.495564 7.99974 0.675411C8.00479 0.855259 7.93551 1.02992 7.80653 1.16254L3.89085 5.77827C3.82352 5.84663 3.74226 5.90148 3.65192 5.93956C3.56158 5.97764 3.46403 5.99815 3.36509 5.99988C3.26614 6.00161 3.16785 5.98451 3.07608 5.94961C2.98431 5.91471 2.90094 5.86273 2.83097 5.79677L0.234262 3.34923C0.161948 3.28572 0.103946 3.20913 0.063718 3.12403C0.0234896 3.03893 0.00185823 2.94707 0.000114546 2.85392C-0.00162914 2.76077 0.0165507 2.66824 0.053569 2.58186C0.0905874 2.49547 0.145686 2.417 0.215578 2.35112C0.28547 2.28525 0.368724 2.23331 0.460372 2.19842C0.552021 2.16353 0.650187 2.14639 0.749014 2.14804C0.847841 2.14968 0.945304 2.17007 1.03559 2.20799C1.12588 2.24591 1.20713 2.30057 1.27452 2.36873L3.32951 4.30475L6.73782 0.211642C6.74395 0.204521 6.74952 0.197726 6.75646 0.191292Z">
                                    </path>
                                </svg>
                            </div>
                            @if (!$enabled)
                                <a href="https://www.php.net/manual/en/install.pecl.windows.php" target="_blank"> view Link</a>
                            @endif
                        </div>
                    </td>
                </tr>
            @endforeach
        @endforeach
    </tbody>
</table>
