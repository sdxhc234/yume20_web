const checkEventDate = () => {
    const eDate={
        year:2020, month:9, day:13
    };
    const nowDate = new Date();
    if(eDate["year"]==nowDate.getFullYear() && eDate["month"]==nowDate.getMonth()+1 && eDate["day"]==nowDate.getDate()){
        return true;
    } else { 
        return false;
    }
}