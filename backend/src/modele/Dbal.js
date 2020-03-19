export default class Dbal {
    /**
     * Singleton
     * @returns {Dbal}
     */
    constructor() {
        if (!!Dbal.instance) {
            return Dbal.instance;
        }
        /**@type Dbal**/
        Dbal.instance = this;
        /**@type string**/
        this.ip = "localhost:8080";
        /**@type Promise<string>**/
        this.token = this.load();
        return this;
    }

    /**
     * Récupère le token d'authorisation pour accéder à l'API
     * @returns {Promise<string>}
     */
    async load(){
        return await this.post("/api/login_check", {"username":"admin","password":"admin"});
    }

    /**
     * Métode get
     * @param url {string}
     * @returns {Promise<string>}
     */
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

    /**
     * Méthode put
     * @param url {string}
     * @returns {Promise<string>}
     */
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

    /**
     * Méthode post
     * @param url {string}
     * @param objet {string}
     * @returns {Promise<string>}
     */
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

    /**
     * Transforme une date au format YYYY-MM-DD
     * @param date
     * @returns {string}
     */
    date2amd(date){
        const options = {year: 'numeric', month: 'numeric', day: 'numeric' };
        date = date.toLocaleDateString('fr-FR', options);
        const val = date.split("/");
        date = val[2] + "-" + val[1] + "-" + val[0];
        return date;
    }
}

//============== A R CH I V E S ==================
/**
 *fetch("http://localhost:8080/api/clients")
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