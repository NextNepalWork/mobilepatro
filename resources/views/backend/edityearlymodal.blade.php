<div class="modal-dialog modal-xl">
    <div class="modal-content">
        <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel">Yearly Horoscope for {{$horodata->date}}</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>
        <div class="modal-content">
            <table class="table table-bordered is-fullwidth">
                <tr>
                    <th>Name</th>
                    <th>Description</th>
                </tr>
                <tr>
                    <td>Aries(मेष)</td>
                    <td>{!! $horodata->aries !!}</td>
                </tr>
                <tr>
                    <td>Taurus(वृष)</td>
                    <td>{!! $horodata->taurus !!}</td>
                </tr>
                <tr>
                    <td>Gemini(मिथुन)</td>
                    <td>{!! $horodata->gemini !!}</td>
                </tr>
                <tr>
                    <td>Cancer(कर्कट)</td>
                    <td>{!! $horodata->cancer !!}</td>
                </tr>
                <tr>
                    <td>Leo(सिंह)</td>
                    <td>{!! $horodata->leo !!}</td>
                </tr>
                <tr>
                    <td>Virgo(कन्या)</td>
                    <td>{!! $horodata->virgo !!}</td>
                </tr>
                <tr>
                    <td>Libra(तुला)</td>
                    <td>{!! $horodata->libra !!}</td>
                </tr>
                <tr>
                    <td>Scorpio(वृश्चिक)</td>
                    <td>{!! $horodata->scorpio !!}</td>
                </tr>
                <tr>
                    <td>Sagittarius(धनु)</td>
                    <td>{!! $horodata->sagittarius !!}</td>
                </tr>
                <tr>
                    <td>Capricorn(मकर)</td>
                    <td>{!! $horodata->capricorn !!}</td>
                </tr>
                <tr>
                    <td>Aquarius(कुम्भ)</td>
                    <td>{!! $horodata->aquarius !!}</td>
                </tr>
                <tr>
                    <td>Pisces(मीन)</td>
                    <td>{!! $horodata->pisces!!}</td>
                </tr>


            </table>
        </div>
    </div>
</div>