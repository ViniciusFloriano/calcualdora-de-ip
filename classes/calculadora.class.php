<?php
    class Calculadora{
        private $ip;
        private $cidr;

        public function __construct($ip, $cidr) {
            $this->setip($ip);
            $this->setcidr($cidr);
        }
        
        public function getip() {
            return $this->ip;
        }
        
        public function setip($ip) {
            $this->ip = $ip;
        }

        public function getcidr() {
            return $this->cidr;
        }
        
        public function setcidr($cidr) {
            $this->cidr = $cidr;
        }
        
        public function __toString(){
            $str =  "<form class='row g-3'>
                        <div class='col-auto'>
                            <label class='form-label'>[Resultado]</label>
                            <div class='input-group input-group-sm'>
                                <span class='input-group-text'>IPv4: </span>
                                <span class='input-group-text'>".$this->getip()."</span>
                            </div>
                            <div class='input-group input-group-sm'>
                                <span class='input-group-text'>IPv4 em binário: </span>
                                <span class='input-group-text'>".$this->transformarEmBin($this->getip())."</span>
                            </div>
                            <div class='input-group input-group-sm'>
                                <span class='input-group-text'>CIDR: </span>
                                <span class='input-group-text'>".$this->getcidr()."</span>
                            </div>
                            <div class='input-group input-group-sm'>
                                <span class='input-group-text'>Máscara: </span>
                                <span class='input-group-text'>".$this->mascaraDeRedeDec()."</span>
                            </div>
                            <div class='input-group input-group-sm'>
                                <span class='input-group-text'>Máscara em binária: </span>
                                <span class='input-group-text'>".$this->mascaraDeRedeBin()."</span>
                            </div>
                            <div class='input-group input-group-sm'>
                                <span class='input-group-text'>Endereço de rede: </span>
                                <span class='input-group-text'>".$this->redeDec()."</span>
                            </div>
                            <div class='input-group input-group-sm'>
                                <span class='input-group-text'>Endereço de rede em binário: </span>
                                <span class='input-group-text'>".$this->redeBin()."</span>
                            </div>
                            <div class='input-group input-group-sm'>
                                <span class='input-group-text'>Primerio utilizável: </span>
                                <span class='input-group-text'>".$this->primeiroEndeUtilDec()."</span>
                            </div> 
                            <div class='input-group input-group-sm'>
                                <span class='input-group-text'>Primerio utilizável em binário: </span>
                                <span class='input-group-text'>".$this->primeiroEndeUtilBin()."</span>
                            </div> 
                            <div class='input-group input-group-sm'>
                                <span class='input-group-text'>Último utilizável: </span>
                                <span class='input-group-text'>".$this->ultimoEndeDec()."</span>
                            </div> 
                            <div class='input-group input-group-sm'>
                                <span class='input-group-text'>Último utilizável em binário: </span>
                                <span class='input-group-text'>".$this->ultimoEndeBin()."</span>
                            </div> 
                            <div class='input-group input-group-sm'>
                                <span class='input-group-text'>Endereço de broadcast: </span>
                                <span class='input-group-text'>".$this->broadcastDec()."</span>
                            </div> 
                            <div class='input-group input-group-sm'>
                                <span class='input-group-text'>Endereço de broadcast em binário: </span>
                                <span class='input-group-text'>".$this->broadcastBin()."</span>
                            </div>      
                        </div>
                    </form>";
            return $str;
        }

        public function transformarEmBin($ip) {
            $ipBin = str_pad(decbin(ip2long($ip)), 32, '0', STR_PAD_LEFT);
            return implode(".", str_split($ipBin, 8));
        }

        public function mascaraDeRedeDec() {
            $bin = null;
            for ($i = 1; $i <= 32; $i ++){
                $bin .= $this->getcidr() >= $i ? '1' : '0';
            }
            $mascara = long2ip(bindec($bin));
            return $mascara;
        }

        public function mascaraDeRedeBin() {
            $bin = null;
            for ($i = 1; $i <= 32; $i ++){
                $bin .= $this->getcidr() >= $i ? '1' : '0';
            }
            $mascara = long2ip(bindec($bin));
            return $this->transformarEmBin($mascara);
        }

        public function redeDec() {
            $endeDeRede = long2ip((ip2long($this->getip())) & ip2long($this->mascaraDeRedeDec()));
            return $endeDeRede;
        }

        public function redeBin() {
            $endeDeRede = long2ip((ip2long($this->getip())) & ip2long($this->mascaraDeRedeDec()));
            return $this->transformarEmBin($endeDeRede);
        }

        public function primeiroEndeUtilDec() {
            $primeiroEndeUtil = long2ip(ip2long($this->redeDec()) + 1);
            return $primeiroEndeUtil;
        }

        public function primeiroEndeUtilBin() {
            $primeiroEndeUtil = long2ip(ip2long($this->redeDec()) + 1);
            return $this->transformarEmBin($primeiroEndeUtil);
        }

        public function broadcastDec() {
            $curinga=long2ip(~ip2long($this->mascaraDeRedeDec()));
            $broadcast = long2ip(ip2long($this->getip()) | ip2long($curinga) );
            return $broadcast;
        }

        public function broadcastBin() {
            $curinga=long2ip(~ip2long($this->mascaraDeRedeDec()));
            $broadcast = long2ip(ip2long($this->getip()) | ip2long($curinga) );
            return $this->transformarEmBin($broadcast);
        }

        public function ultimoEndeDec() {
            $ultimoEndeUtil = long2ip(ip2long($this->broadcastDec()) - 1);
            return $ultimoEndeUtil;
        }

        public function ultimoEndeBin() {
            $ultimoEndeUtil = long2ip(ip2long($this->broadcastDec()) - 1);
            return $this->transformarEmBin($ultimoEndeUtil);
        }
    }
?>