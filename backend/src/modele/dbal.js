export default class Dbal {
    constructor() {
        if (!!Dbal.instance) {
            return Dbal.instance;
        }
        Dbal.instance = this;

        return this;
    }

    get(url){
        return new Promise((resolve, reject)=>{
            const xhr = new window.XMLHttpRequest();
            xhr.onreadystatechange = ()=>{
                if (xhr.readyState === 4){
                    if (xhr.status === 200){
                        resolve(xhr.responseText)
                    } else{
                        reject(xhr);
                    }
                }
            };
            xhr.open('GET', url, true);
            xhr.send()
        })
    }

    put(url){
        return new Promise((resolve, reject)=>{
            const xhr = new window.XMLHttpRequest();
            xhr.onreadystatechange = ()=>{
                if (xhr.readyState === 4){
                    if (xhr.status === 200){
                        resolve(xhr.responseText)
                    } else{
                        reject(xhr);
                    }
                }
            };
            xhr.open('PUT', url, true);
            xhr.send()
        })
    }

    post(url){
        return new Promise((resolve, reject)=>{
            const xhr = new window.XMLHttpRequest();
            xhr.onreadystatechange = ()=>{
                if (xhr.readyState === 4){
                    if (xhr.status === 201){
                        resolve(xhr.responseText)
                    } else{
                        reject(xhr);
                    }
                }
            };
            xhr.open('POST', url, true);
            xhr.send()
        })
    }

    date2amd(date){
        const options = {year: 'numeric', month: 'numeric', day: 'numeric' };
        date = date.toLocaleDateString('fr-FR', options);
        const val = date.split("/");
        date = val[2] + "-" + val[1] + "-" + val[0];
        return date;
    }
}

/**
 *             fetch("http://localhost:8080/api/clients")
 .then(res => res.json())
 .then(
 async (result) => {
                        const create = result.map((c)=> {
                            clients.push(new client(c));
                        });
                        return await Promise.all(create);
                    },
 (error) => {console.log(error);}
 );
 **/