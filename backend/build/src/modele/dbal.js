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