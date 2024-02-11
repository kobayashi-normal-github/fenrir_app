function getGeoLocation() {
    const status = document.querySelector("#geolocation_status");
    const googleMapLink = document.querySelector("#google_map_link");
    const inputLatitude = document.querySelector("#latitude");
    const inputLongitude = document.querySelector("#longitude");

    function success(position) {
        const latitude = position.coords.latitude;
        const longitude = position.coords.longitude;
        const accuracy = Math.round(position.coords.accuracy);

        status.value = "現在地との誤差: "+accuracy+"[m]";
        inputLatitude.value = latitude;
        inputLongitude.value = longitude;

        googleMapLink.href = "https://www.google.com/maps/search/?api=1&query="+latitude+","+longitude;
        googleMapLink.target = "_blank";
        googleMapLink.rel = "noopener noreferrer";
    }

    function error(error) {
        status.value = "位置情報が取得できませんでした．";
        if(error.code == 1){
            window.alert('位置情報取得を許可してください');
        }else if(error.code == 3){
            window.alert('タイムアウトしました．');
        }

    }

    if (!navigator.geolocation) {
        status.value = "このブラウザーは位置情報に対応していません";
    } else {
        status.value = "位置情報を取得中…";
        navigator.geolocation.getCurrentPosition(success, error);
    }
}

document.querySelector("#geolocation_button").addEventListener("click", getGeoLocation);
