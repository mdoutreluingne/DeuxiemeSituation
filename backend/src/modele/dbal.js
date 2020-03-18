export default class Dbal {
    constructor() {
        if (!!Dbal.instance) {
            return Dbal.instance;
        }
        Dbal.instance = this;
        this.ip = "localhost:8080";
        this.token = this.load();
        return this;
    }

    async load(){
        return await this.post("/api/login_check", {"username":"admin","password":"admin"});
    }

    async get(url){
        url = "http://" + this.ip + url;
        let token = await this.token;
        token = JSON.parse(token).token;
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
            xhr.setRequestHeader("Authorization", "Bearer " + token);
            xhr.send()
        })
    }

    async put(url){
        url = "http://" + this.ip + url;
        let token = await this.token;
        token = JSON.parse(token).token;
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
            xhr.setRequestHeader("Authorization", "Bearer " + token);
            xhr.send()
        })
    }

    post(url, objet){
        url = "http://" + this.ip + url;
        return new Promise(async (resolve, reject)=>{
            const xhr = new window.XMLHttpRequest();
            xhr.onreadystatechange = ()=>{
                if (xhr.readyState === 4){
                    if (xhr.status === 201 || xhr.status === 200){
                        resolve(xhr.responseText)
                    } else{
                        reject(xhr);
                    }
                }
            };
            xhr.open('POST', url, true);
            if (this.token !== undefined){
                let token = await this.token;
                token = JSON.parse(token).token;
                xhr.setRequestHeader("Authorization", "Bearer " + token);
            }
            if (objet){
                xhr.setRequestHeader("Content-Type", "application/json");
                xhr.send(JSON.stringify(objet))
            }
            else {xhr.send()}
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