function geoFindMe() {
        console.log('on')
        const status = document.querySelector("#geolocation_status");
        const inputLatitude = document.querySelector("#latitude");
        const inputLongitude = document.querySelector("#longitude");
        // const mapLink = document.querySelector("#map-link");

        // mapLink.href = "";
        // mapLink.textContent = "";

        function success(position) {
            const latitude = position.coords.latitude;
            const longitude = position.coords.longitude;

            status.value = `緯度: ${latitude}°、経度: ${longitude}°`;
            // status.value = `${latitude},${longitude}`;
            inputLatitude.value = latitude;
            inputLongitude.value = longitude;
            // mapLink.href = `https://www.openstreetmap.org/#map=18/${latitude}/${longitude}`;
            // mapLink.textContent = `緯度: ${latitude}°、経度: ${longitude}°`;
        }

        function error() {
            status.value = "位置情報が取得できませんでした";
        }

        if (!navigator.geolocation) {
            status.value = "このブラウザーは位置情報に対応していません";
        } else {
            status.value = "位置情報を取得中…";
            navigator.geolocation.getCurrentPosition(success, error);
        }
    }
    document.querySelector("#geolocation_button").addEventListener("click", geoFindMe);
